<template>
    <div class="container">
          <div class="py-5 greyBg">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0 text-gold fw-bold">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-end greyBg">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a class="text-dark" href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        

        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-3">
                    <div class="input-group d-flex mb-3">
                        <input class="form-control form-control-lg searchbar" type="text" placeholder="Procurar Produto" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 20px;">
                                <path fill="goldenrod" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                            </svg>
                        </button>
                    </div>

                    <div class="py-2 px-4 bg-gold text-white mb-3"><strong class="small text-uppercase fw-bold">Categories</strong></div>

                    <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                    <li class="mb-2"><a class="reset-anchor" href="#!">Placeholder Category</a></li>
                    <li class="mb-2"><a class="reset-anchor" href="#!">Placeholder Category</a></li>
                    <li class="mb-2"><a class="reset-anchor" href="#!">Placeholder Category</a></li>
                    <li class="mb-2"><a class="reset-anchor" href="#!">Placeholder Category</a></li>
                    <li class="mb-2"><a class="reset-anchor" href="#!">Placeholder Category</a></li>
                    <li class="mb-2"><a class="reset-anchor" href="#!">Placeholder Category</a></li>
                    </ul>
                    
                    <div class="py-2 px-4 bg-gold text-white mb-3"><strong class="small text-uppercase fw-bold">Show only</strong></div>

                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" id="checkbox_1">
                        <label class="form-check-label" for="checkbox_1">Placeholder Filter</label>
                        </div>
                        <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" id="checkbox_2">
                        <label class="form-check-label" for="checkbox_2">Placeholder Filter</label>
                    </div>
                    <div class="py-2 px-4 bg-gold text-white mb-3"><strong class="small text-uppercase fw-bold">Show only</strong></div>
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" id="checkbox_1">
                        <label class="form-check-label" for="checkbox_1">Placeholder Filter</label>
                        </div>
                        <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" id="checkbox_2">
                        <label class="form-check-label" for="checkbox_2">Placeholder Filter</label>
                    </div>
                    <div class="py-2 px-4 bg-gold text-white mb-3"><strong class="small text-uppercase fw-bold">Show only</strong></div>
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" id="checkbox_1">
                        <label class="form-check-label" for="checkbox_1">Placeholder Filter</label>
                        </div>
                        <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" id="checkbox_2">
                        <label class="form-check-label" for="checkbox_2">Placeholder Filter</label>
                    </div>
                </div>
                <div class="col-9">
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 w-100">
                        <div class="row mb-3 align-items-center d-flex justify-content-between">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                <li class="list-inline-item">
                                    <select class="selectpicker" data-customclass="form-control form-control-sm">
                                    <option value>Sort By </option>
                                    <option value="default">Default sorting </option>
                                    <option value="popularity">Popularity </option>
                                    <option value="low-high">Price: Low to High </option>
                                    <option value="high-low">Price: High to Low </option>
                                    </select>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" v-for="(product, index) in products" :key="index">
                        <Product :product="product" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Product from '../components/Product.vue'
import { ref, onMounted } from 'vue';
import { getProducts } from '@/services/http';
export default{
    name: 'ProductsView',
    components: {
        Product,
    },
    setup() {
        const products = ref([]);

        onMounted(async () => {
        try {
            const data = await getProducts();
            products.value = data;
        } catch (error) {
            console.error(error);
        }
        });
        return { 
            products,
            Product
        };
    }
}
    

</script>

<style>
.greyBg {
  background-color: rgb(244, 245, 249);
}
.text-gold {
  color: goldenrod;
}
.bg-gold{
    background-color: rgba(218, 165, 32, 0.733);
}
.searchbar{
    max-height: 20px!important;
}
img{
  background-color: white;
  min-height: 280px;
  min-width: 260px;
  max-width: 260px!important;
  max-height: 280px!important;
  box-shadow: 0 0 2px rgba(33, 33, 33, 0.2);
  object-fit:contain;  
  transition: 0.4s;
  cursor: pointer;
}
.reset-anchor {
  color: inherit;
  transition: all 0.3s;
}

.reset-anchor:hover, .reset-anchor:focus {
  text-decoration: none;
}

.selectpicker{
    height: 38px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
  
}
</style>