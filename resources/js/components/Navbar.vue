<template>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark mb-4 ">
    <div class="container">
      <router-link class="navbar-brand" to="/">Главная</router-link>
      <div class="" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li v-if="$route.name == 'Home'" class="nav-item">
            <router-link
              v-if="sum == 0"
              class="btn btn-warning text-light"
              to="/cart">
              Корзина
            </router-link>
            <router-link
              v-else
              class="btn btn-warning text-dark"
              to="/cart">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 469.333 469.333" class="button__icon" role="img" focusable="false"><title>Корзина</title><path d="M434.979 42.667H85.333c-1.053 0-2.014.396-3.001.693l-8.594-28.241A21.329 21.329 0 0053.333 0H10.667C4.776 0 0 4.776 0 10.667V32c0 5.891 4.776 10.667 10.667 10.667h26.865l66.646 219.01-24.891 29.039c-9.838 11.477-14.268 27.291-9.74 41.713 5.791 18.445 22.07 30.237 40.839 30.237H416c5.891 0 10.667-4.776 10.667-10.667v-21.333c0-5.891-4.776-10.667-10.667-10.667H110.385l33.813-39.448c.85-.992 1.475-2.112 2.12-3.219h206.703a42.68 42.68 0 0038.618-24.507l74.434-158.17a34.636 34.636 0 003.26-14.615v-3.021c0-18.971-15.381-34.352-34.354-34.352z"></path><circle cx="128" cy="426.667" r="42.667"></circle><circle cx="384" cy="426.667" r="42.667"></circle></svg>
              {{sum}} ₽
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  props:['sum'],
}
</script>

<style scoped>
.btn{
  display: flex;
  justify-content: center;
  align-items: center;
  gap:10px;
  font-size: 17px;
}
</style>
