@extends('layouts.frontendLayout')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js"></script>
    <style>
        .fc .fc-view-harness{
            max-height: 300px !important;
        }
    </style>
@endpush
@push('js')
<script src="{{ asset('js/app.js') }}"></script>
    <script>
        
        function nextweek() {
            var today = new Date();
            var nextweek = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7);
            return nextweek;
        }

        function thisTime(){
            var today = new Date();
            var now = new Date(today.getFullYear(), today.getMonth(), today.getDate(),today.getHours(),today.getMinutes());
            return now;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                 eventStartEditable: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                validRange: {
                    start: thisTime(),
                    end: nextweek()
                },
                initialDate: Date.now().getDate,
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                locale: 'pt',
                select: function(arg) {

                },
                eventClick: function(arg) {
                    console.log(arg.event.id);
                    if(arg.event.id == {{Auth::user()->id}}){
                        if(confirm('Delete')){
                           $("#delete_event").submit(function(e) {
                            e.preventDefault(); // avoid to execute the actual submit of the form.
                            var form = $(this);
                            
                            
                            $.ajax({
                                type: "POST",
                                url: "{{ asset('/agendar/delete') }}/" + arg.event.id,
                                data: form.serialize(), // serializes the form's elements.
                                success: function(data)
                                {
                                    console.log(data);
                                    //show response from the php script.
                                },
                                error: function (data) {
                                    console.log(data);
                                  }
                                

                                });

                            
                        });
                    }else{
                        alert('nao possue permissão para editar')
                    }
                }},
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                @foreach ($agendas as $agenda )
                    @if (count($agenda->agendas) > 0)
                        @foreach ( $agenda->agendas  as $ev )
                        
                         {
                            id:'{{ $ev->pivot->user_id }}',
                            title: '{{ $ev->pivot->title }}',
                            start: new Date('{{ $ev->pivot->start_at }}'),
                            end:new Date('{{ $ev->pivot->start_at }}'),
                            color: '#F30101',
                            editable: false
                        }
                    @endforeach
                @endif
            @endforeach

                   
                ]
            });

            calendar.render();
        });

    </script>
@endpush
@section('content')
<form id="delete_event" method="post">
    @csrf
</form>
    <section class="section-pagetop ">

        <div class="container clearfix">
            <div id='calendar'></div>
        </div>
    </section>
@endsection
