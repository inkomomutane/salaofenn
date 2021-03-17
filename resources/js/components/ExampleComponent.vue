<template>
<div>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <main class="col-sm-9">
                <div class="card" >
                        <table class="table table-hover shopping-cart-wrap response">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col">Produto</th>
                                    <th scope="col" width="120">Quantidade</th>
                                    <th scope="col" width="120">Preco</th>
                                    <th scope="col" class="text-right" width="200">Acoes</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr v-for="cart in carts" >
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img :src="cart.product.image" class="img-thumbnail img-sm"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">{{ cart.product.name }}</h6>
                                                <dl class="dlist-inline small">
                                                    <dt>Promotion: - {{ cart.product.promotion}}%</dt>
                                                </dl>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <input class="form-control"  type="number" name="quantity"  min="0" v-model=cart.quantity required> 
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">MZN {{ cart.product.price}}</var>
                                            <small class="text-muted">(MZN cada)</small>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a data-original-title="Save to Wishlist" title="" :href="baseurl+'/favorites/'+cart.product.id" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>
                                        <a :href="baseurl+ '/cart/remove/'+ cart.id" class="btn btn-outline-danger"> × Remove</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- card.// -->
                </main> <!-- col.// -->
                <aside class="col-sm-3">
                    <p class="alert alert-success">Efetue o pagamento com o método mais adequado. </p>
                    <dl class="dlist-align">
                        <dt>Subtotal: </dt>
                        <dd class="text-right">MZN
                            {{totalItem}}
                        </dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Disconto:</dt>
                        <dd class="text-right">MZN {{totalDescount}}</dd>
                    </dl>
                    <dl class="dlist-align h4">
                        <dt>Total:</dt>
                        <dd class="text-right"><strong>MZN {{total}}</strong></dd>
                    </dl>
                    <hr>
                    
                    <button  type="button" class = "btn btn-danger" value=" Pagamento Via M-pesa" data-toggle="modal" data-target="#Mpesa">
                        <figure class="itemside">
                        <aside class=""><img :src=" baseurl+'/images/mpesa.jpg'"> Pagamento Via M-pesa</aside>
                    </figure>
                    </button>

                        <!-- Modal -->
<div class="modal fade" id="Mpesa" tabindex="-1" role="dialog" aria-labelledby="MpesaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MpesaLabel">Efetuar Pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<div class="form-group">
		  <label for="">Contacto</label>
       <input placeholder="Insira seu contacto M-pesa" class=" shadow-sm form-control  mb2 my-2" type ="text" v-model="contact" @input="acceptNumber"> 
		  <small id="helpId" class="text-muted">Contacto</small>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button @click="submitForm" type="submit" class="btn btn-success" id="send">Confirmar</button>
      </div>
    </div>
  </div>
</div>

                </aside> <!-- col.// -->
            </div>

        </div>
    </section>
</div>
</template>

<script>
import $ from 'jquery'
export default {
    props: ['baseurl'],
    data() {
            return {
              carts: {

              },
              quantity:null,
              contact:null,
            }
        },
        methods: {
            acceptNumber() {
                        var x = this.contact.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,4})/);
                            this.contact = !x[2] ? x[1] : '' + x[1] + '' + x[2] + (x[3] ? '' + x[3] : '');
                },

            getCarts(){
                axios.get(this.baseurl+'/getCarts')
                     .then((response)=>{
                       this.carts = response.data
                     })
            },

            submitForm(){
               axios.post(this.baseurl+'/carts/order', {"contact":this.contact,"total_price":this.total ,"cart":this.carts})
                 .then((res) => {
                     console.log(res);
                     if(res.data.status == 201){
                         axios.get(this.baseurl + '/cartx/freeze').then((res)=>{
                             window.location.href = this.baseurl + '/buylog';
                         })
                         this.getCarts();
                     }else{
                         alert('Falha no pagamento');
                     }
                 })
                 .catch((error) => {
                     console.log(error);
                 })
            }

        },
        created() {
            this.getCarts()
        },
        computed:{
             totalItem: function(){
                    let sum = 0;
                    for(var pos in this.carts ){
                        //console.log(item);
                       sum += (parseFloat(this.carts[pos].price) * parseFloat(this.carts[pos].quantity));
                    }

                    return sum.toFixed(3);
                },
            totalDescount:function(){
                    let sum = 0;
                 
                    for(var pos in this.carts ){
                        sum += (parseFloat(this.carts[pos].price  * (this.carts[pos].product.promotion/100)) * parseFloat(this.carts[pos].quantity));
                    }

                    return sum.toFixed(3);
                },

                total: function(){
                    return (this.totalItem - this.totalDescount).toFixed(3);
                }
            }
        
}
</script>
