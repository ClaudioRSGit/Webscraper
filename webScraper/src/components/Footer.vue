<template>
    <div class="bg-dark text-white" v-if="!isPaginaOculta">
        <div class="container py-4">
          <div class="row py-3">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Customer services</h6>
              <ul class="list-unstyled mb-0">
                <li><span class="footer-link">Placeholder</span></li>
                <li><span class="footer-link">Placeholder</span></li>
                <li><span class="footer-link">Placeholder</span></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Company</h6>
              <ul class="list-unstyled mb-0">
                <li><span class="footer-link">Placeholder</span></li>
                <li><span class="footer-link">Placeholder</span></li>
                <li><span class="footer-link">Placeholder</span></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><span class="footer-link">Placeholder</span></li>
                <li><span class="footer-link">Placeholder</span></li>
                <li><span class="footer-link">Placeholder</span></li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
</template>

<script>
export default{
  name: 'Footer',
  setup(){
    return{
      
    }
  },
  computed: {
    isPaginaOculta() {
      return this.$route.name === 'administration';
    },
  }
}
</script>

<style scoped>

</style>