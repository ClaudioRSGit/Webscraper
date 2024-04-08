<template>
    <div class="container">
          <div class="py-5 greyBg">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0 text-red fw-bold">Shop</h1>
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
        

        <div class="col-12 mt-4 mb-4">
            <div class="row">
                <div class="col-2">
                    <form @submit.prevent="filterProducts" method="GET">
                        <div class="border-red">
                            <div class="text-danger">
                                <strong class="text-uppercase fw-bold">Categorias</strong>
                                <hr style="fill: red;">
                            </div>
                            <div v-for="(category, index) in categories" :key="index">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" :id="'checkbox_' + index" name="category[{{ category.id }}]" :value="category.id">
                                    <label class="form-check-label" :for="'checkbox_' + index">{{ category.description }}</label>
                                </div>
                            </div>

                            <div class="mt-4 text-danger">
                                <strong class="text-uppercase fw-bold">Fabricantes</strong>
                                <hr style="fill: red;">
                            </div>

                            <div v-for="(brand, index) in brands" :key="index">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" :id="'checkbox_' + index" :name="'brand[' + brand + ']'" :value="brand">
                                    <label class="form-check-label" :for="'checkbox_' + index">{{ brand }}</label>
                                </div>
                            </div>

                            <div class="mt-4 text-danger">
                                <strong class="text-uppercase fw-bold">Avaliações</strong>
                                <hr style="fill: red;">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bestRated" name="bestRated">
                                <label class="form-check-label" for="bestRated">Melhores Avaliados</label>
                            </div>
                            
                            <div class="text-danger mt-3">
                                <strong class="text-uppercase fw-bold">Ordenar por</strong>
                                <hr style="fill: red;">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="titleAscending" name="titleFilter" value="titleAscending">
                                <label class="form-check-label" for="titleAscending">Nome ASC</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="titleDescending" name="titleFilter" value="titleDescending">
                                <label class="form-check-label" for="titleDescending">Nome DEC</label>
                            </div>
                                
                            <button type="submit" class="btn btn-danger w-100 mt-2">Aplicar Filtro</button>
                        </div>
                    </form>
                </div>
                <div class="col-10">
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 w-100">
                        <div class="row mb-3 align-items-center d-flex justify-content-between">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                <p class="text-sm mb-0"> <b class="text-danger">{{ products.length }} {{ products.length  > 1 ? 'Produtos Encontrados' : 'Produto Encontrado'}}</b></p>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end gap-2">
                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                <li class="list-inline-item">
                                    <span>Produtos:</span>
                                    <select class="selectpicker" data-customclass="form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20 </option>
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
import { getProducts, getCategories } from '@/services/http';
import axiosInstance from '@/services/http';

export default{
    name: 'ProductsView',
    components: {
        Product,
    },
    setup() {
        const products = ref([]);
        const categories = ref([]);
        const brands = ref([]);
        
        const filterProducts = async (event) => {

            const form = new FormData(event.target);
            const data = {};
            
            for (let key of form.keys()) {
                data[key] = form.getAll(key);
            }

            console.log(data);

            try {
                const response = await axiosInstance.get('/products', {
                    params: data
                });
                products.value = response.data;
            } catch (error) {
                console.error(error);
            }
        };

        onMounted(async () => {
        try {
            const data = await getProducts();
            products.value = data.filter(product => product.isActive === 1);

            let categoryData;
            if (localStorage.getItem('categories')) {
                categoryData = JSON.parse(localStorage.getItem('categories'));
            } else {
                categoryData = await getCategories();
                localStorage.setItem('categories', JSON.stringify(categoryData));
            }
            categories.value = categoryData;

            brands.value = data.map(product => product.brand);
        } catch (error) {
            console.error(error);
        }
        });
        return {
            products,
            Product,
            categories,
            filterProducts,
            brands
        };
    }
}
    

</script>

<style>
.form-check-input[type="checkbox"] {
    border: 1px solid red;
    cursor: pointer;
    background-color: white;
}
.form-check-input[type="checkbox"]:checked {
    background-color: red;
}
.greyBg {
  background-color: rgb(244, 245, 249);
}
.text-red, option {
  color: red;
}
.bg-red{
    background-color: rgba(218, 32, 32, 1);
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