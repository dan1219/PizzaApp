<template>
  <Navbar></Navbar>
  <div class='container'>
    <h1 class="text-center">Корзина</h1>
    <h2 v-if="sum == 0" class="text-center">Ваша корзина пуста</h2>
    <template v-else>
      <div v-for="item in filteredPizzaArr" class="pizza__block mb3 row align-items-center">
        <img class="pizza__card-img col-md-2 col-6 offset-3 offset-md-0 mb-md-0 mb-3" :src="item.img" :alt="item.name">
        <div class="pizza__card_name col-md-2 col-6 offset-3 offset-md-0 mb-md-0 mb-3">{{item.name}}</div>
        <div class="pizza__card__buttons row col-md-2 offset-md-3 col-6 offset-3 justify-content-center mb-md-0 mb-3">
          <button @click="subtractOne(item)" class="button_subtract btn btn-warning text-light col-md-3 col-3">-</button>
          <div class="pizza__count col-md-4 col-4">{{item.count}}</div>
          <button @click="addOne(item)" class="button_add btn btn-warning text-light col-md-3 col-3">+</button>
        </div>
        <div class="pizza__sum col-md-2">{{item.count * item.price}} ₽</div>

        <div @click="deleteProduct(item)" class="cross__img-wrapper col-md-1">
          <img class="cross__img" src="/images/cross.svg" alt="">
        </div>

      </div>
      <div class="sum__field mt-md-0 mt-5 mb-5 ">Итого: {{sum}} ₽</div>
    </template>

    <div class="navigation row justify-content-between mt-5">
        <router-link class="navigation___button btn btn-warning text-light col-5 col-md-2" to="/">Назад</router-link>
        <router-link :class="{disabled: sum == 0}" class="navigation___button btn btn-warning text-light col-5 col-md-2" to="/checkout">Оформить заказ</router-link>
    </div>

  </div>

</template>

<script>
import Navbar from '../components/Navbar.vue'
export default {
  props:['sum','pizzaArr'],
  emits:['saveCartInfo'],
  components:{
    Navbar
  },
  mounted(){
  },
  computed:{
    filteredPizzaArr: function(){
      const choosenPizza = this.pizzaArr.filter(elem => {
        return elem.count > 0
      })
      return choosenPizza
    },
  },
  methods:{
    addOne(item){
      item.count++
      this.$emit('saveCartInfo')
    },
    subtractOne(item){
      item.count--
      this.$emit('saveCartInfo')
    },
    deleteProduct(item){
      item.count = 0
      this.$emit('saveCartInfo')
    }
  }

}
</script>

<style scoped>
.pizza__block{
  padding:20px;
  position: relative;
}
.pizza__card-img{
  height: auto;
}
.pizza__card_name{
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.pizza__card__buttons{
  height: 50%;
}
.pizza__count{
  font-size: 17px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.pizza__sum{
  font-size:25px;
  text-align: center;
}
.cross__img{
  width: 20px;
  height: auto;
}
.btn{
  display:flex;
  justify-content: center;
  align-items: center;
}
.sum__field{
  font-size: 30px;
  text-align: center;
}
.cross__img-wrapper:hover{
  cursor:pointer;
}
.navigation{
  position: fixed;
  bottom: 0;
  left:0;
  width: 100%;
}
@media (max-width: 768px) {
  .cross__img-wrapper {
    width: 20px;
    position: absolute;
    top:20px;
    right:30px;
  }
  .cross__img{
    width: 30px;
    height: auto;
  }
  .pizza__block{
    position: relative;
    padding-top: 50px;
  }
  .pizza__block::after{
    position:absolute;
    bottom:-5px;
    left:50%;
    content:'';
    transform: translate(-50%, 0);
    width:60%;
    height:1px;
    background-color: rgb(231, 222, 222);
  }
  .pizza__card_name{
    font-size: 25px;
  }
}
</style>
