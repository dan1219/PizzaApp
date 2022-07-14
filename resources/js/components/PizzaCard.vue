<template>
  <img :class="{unavailable__img:!item.available}" class="pizza__card-img" :src="item.img" :alt="item.name">
  <div class="pizza__card-name mb-3">{{item.name}}</div>
  <div
    v-if="item.available"
    class="row justify-content-center align-items-center mb-3"
  >
    <div class="pizza__card-price col-md-4 col-12 mb-md-0 mb-2">{{item.price}} ₽</div>
    <Button
      class="col-md-4 col-6"
      :count="item.count"
      @addOne="addOne"
      @subtractOne="subtractOne"
    />
  </div>
  <div v-else class="unavailable__text">Временно не доступно</div>
</template>

<script>
import Button from '../components/Button.vue'
export default {
  props:['item'],
  emits:['buttonWasClick'],
  components:{
    Button,
  },
  methods:{
    addOne(){
      this.item.count++
      this.$emit('buttonWasClick')
    },
    subtractOne(){
      this.item.count--
      this.$emit('buttonWasClick')
    }
  }
}
</script>

<style scoped>
.pizza__card-img{
  width: 60%;
  height: auto;
  object-fit: cover;
}
.pizza__card-name{
  font-size: 25px;
}
.pizza__card-price{
  font-size: 20px;
}
.pizza__card-name,.pizza__card-price{
  font-weight: bold;
}
.unavailable__text{
  font-size: 20px;
  font-weight: bold;
  color:gray;
}
.unavailable__img{
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
}
</style>
