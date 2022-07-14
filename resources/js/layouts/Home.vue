<template>
  <Navbar :sum="sum"></Navbar>
  <div class="container">
    <div v-if="loaded" class="row">
      <div class="pizza__card col-lg-4 col-sm-6 mb-3" v-for="item in pizzaArr">
          <PizzaCard
            :item="item"
            @buttonWasClick="saveCartInfo"
          ></PizzaCard>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue'
import PizzaCard from '../components/PizzaCard.vue'
export default {
  props:['pizzaArr','loaded','sum'],
  emits:['saveCartInfo'],
  components:{
    Navbar,PizzaCard
  },
  methods:{
    saveCartInfo:function(){
      this.$emit('saveCartInfo')
    }
  },
}
</script>

<style  scoped>
.pizza__card{
  text-align: center;
}
</style>
