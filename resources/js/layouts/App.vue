<template>
  <router-view
    :pizzaArr="pizzaArr"
    :loaded="loaded"
    :sum="getSum()"
    @saveCartInfo="saveCartInfo"
    @resetOrder="resetOrder"
  >
  </router-view>
</template>

<script>
export default {
    data() {
        return {
            pizzaArr: [],
            loaded: false,
        }
    },
    mounted() {
        this.getPizza()
    },
    methods: {
        getPizza() {
            axios.get('/api/pizza')
                .then(res => {
                    const arr = res.data;
                    this.pizzaArr = arr.map(elem => {
                        return ({
                            'id': elem.id,
                            'name': elem.name,
                            'price': elem.price,
                            'img': elem.img,
                            'available': elem.available,
                            'count': 0,
                        })
                    })
                    this.loaded = true
                    this.getCartInfo()
                })
                .catch(err => {
                    console.log('pizza error');
                })
        },
        saveCartInfo: function() {
            const dataArr = this.pizzaArr.map(elem => {
                return ({
                    id: elem.id,
                    count: elem.count
                })
            })
            const parsed = JSON.stringify(dataArr);
            localStorage.setItem('cartInfo', parsed);
        },

        getCartInfo() {
            if (localStorage.getItem('cartInfo')) {
                try {
                    const dataArr = JSON.parse(localStorage.getItem('cartInfo'));
                    this.pizzaArr = this.pizzaArr.map(elem => {
                        for (let i = 0; i < dataArr.length; i++) {
                            if (elem.id == dataArr[i].id) {
                                return {
                                    ...elem,
                                    count: dataArr[i].count
                                }
                            }
                        }
                    })
                } catch (e) {
                    localStorage.removeItem('cartInfo');
                }
            }
        },
        getSum:function(){
          let sum = 0
          this.pizzaArr.forEach(item => {
            if (item.count > 0)
              sum += item.count*item.price
          });
          return sum;
        },
        resetOrder:function(){
          this.pizzaArr = this.pizzaArr.map(elem => {
            return ({
              ...elem,
              'count':0
            })
          })
          this.saveCartInfo()
        }
    }
}
</script>

<style scoped>
</style>
