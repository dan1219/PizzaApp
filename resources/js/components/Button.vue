<template>
  <button
    v-if="count==0"
    type="button"
    class="btn btn-warning text-light"
    @click="addOne"
  >В корзину</button>
  <div v-else>
    <div class="row">
      <button @click="subtractOne" class="btn btn-warning text-light col-3 button-element">-</button>
      <div class="col-6 button-element">{{count}}</div>
      <button @click="addOne" class="btn btn-warning text-light col-3 button-element">+</button>
    </div>
  </div>
</template>

<script>
export default {
  props:['count'],
  methods:{
    addOne(){
      this.$emit('addOne')
    },
    subtractOne(){
      this.$emit('subtractOne')
    }
  }
}
</script>

<style scoped>
.btn{
  font-weight: 700;
}
.button-element{
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
