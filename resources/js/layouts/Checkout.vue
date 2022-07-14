<template>
  <Navbar></Navbar>
  <div v-if="!orderedSuccess" class="container">
    <h1 class="text-center mb-5">Оформление заказа</h1>
    <form>
      <div class="row justify-content-center">
        <div class="row col-md-6">
          <div class="row mb-md-3">
            <input
              v-model="name"
              :class="{'error':nameError}"
              class="col-md-5 me-md-3 mb-md-0 mb-3"
              type="text" name="name" placeholder="Имя"
            >
            <input
              v-model="phone"
              :class="{'error':phoneError}"
              class="col-md-5 mb-md-0 mb-3"
              @keypress="isNumber"
              type="number"
              name="phone"
              placeholder="Телефон"
            >
          </div>
          <div class="row justify-content-between">
            <input
              v-model="street"
              :class="{'error':streetError}"
              class="col-md-5 mb-md-0 mb-3"
              type="text"
              name="street"
              placeholder="Улица"
            >
            <input
              v-model="house"
              :class="{'error':houseError}"
              class="col-md-3 mb-md-0 mb-3"
              type="text"
              name="house"
              placeholder="Дом"
            >
            <input
              v-model="apartment"
              :class="{'error':apartmentError}"
              class="col-md-3 mb-md-0 mb-3"
              type="text"
              name="apartment"
              placeholder="Квартира"
            >
          </div>
        </div>
      <div class="row col-md-6 justify-content-center">
        <div class="sum mb-md-0 mb-3">К оплате: {{sum}} ₽</div>
        <button
          @click="handleClick"
          class="col-6 button_subtract btn btn-warning text-light mb-md-0 mb-5"
        >Заказать</button>
      </div>
      </div>
    </form>
  </div>
  <div v-else class="container order__info">
    Ваш заказ #{{orderNumber}}
  </div>
  <div v-if="!orderedSuccess" class="navigation row">
      <router-link class="navigation___button btn btn-warning text-light col-5 col-md-2" to="/cart">Назад</router-link>
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue'
export default {
  components:{
    Navbar
  },
  emits:['resetOrder'],
  props:['pizzaArr','sum'],
  data(){
    return{
      name:'',
      phone:'',
      street:'',
      house:'',
      apartment:'',
      nameError:false,
      phoneError:false,
      streetError:false,
      houseError:false,
      apartmentError:false,
      orderedSuccess:false,
      orderNumber:''
    }
  },
  mounted(){
    if (this.sum == 0)
      this.$router.push('/')
  },
  methods:{
    handleClick:function(e){
      e.preventDefault()
      this.nameError = this.name ==  '' ? true : false
      this.phoneError = this.phone ==  '' ? true : false
      this.streetError =  this.street ==  '' ? true : false
      this.houseError =  this.house ==  '' ? true : false
      this.apartmentError =  this.apartment ==  '' ? true : false

      if (this.nameError || this.phoneError || this.streetError || this.houseError || this.apartmentError) return

      const orderedPizza = this.pizzaArr.filter(elem => {
        return elem.count > 0
      })

      axios.post('/api/order',{
        name:this.name,
        phone:this.phone,
        street:this.street,
        house:this.house,
        apartment:this.apartment,
        orderedPizza
      },{
      headers: {
        'Content-Type': 'application/json'
      }
      })
      .then(res => {
        if (res.data.status == 'ok'){
          this.orderedSuccess = true
          this.orderNumber = res.data.orderId
          this.resetOrder()
        }
      })
      .catch(err => {
        console.log('some error');
        console.log(err);
      })
    },
    resetOrder:function(){
      this.$emit('resetOrder')
    },
    isNumber(e){
      const keysAllowed = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']
      const keyPressed = e.key
      if (!keysAllowed.includes(keyPressed)) {
             e.preventDefault()
      }
    }
  }
}
</script>

<style scoped>
input{
  height:40px;
}
.sum{
  font-size:25px;
  font-weight: bold;
  text-align: center;
}
.error{
  border: 1px solid red;
}
.order__info{
  height: 80vh;
  display: flex;
  text-align: center;
  justify-content: center;
  align-items: center;
  font-size: 40px;
  font-weight: bold;
}
.navigation{
  position: fixed;
  bottom: 0;
  left:0;
  width: 100%;
}
</style>
