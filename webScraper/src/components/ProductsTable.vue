<template>
  <div class="card mb-4 mt-3">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h5 class="fw-bold">Products</h5>
                <button type="button" class="btn btn-primary" @click="showModal">Add Product</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id - Title</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mercado</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products" :key="product.id" v-if="products.length > 0">
                        <td>
                            <div class="d-flex px-2 py-1">
                            <div v-if="product.image && product.image.length > 0">
                              <img :src="product.image[0].link" alt="Product Image" class="avatar avatar-sm me-3 mt-1" style="width: 40px; height: 40px; border-radius: 50%;">
                            </div>
                            <div v-else>
                              <div>
                                <span class="avatar bg-primary avatar-sm me-3 mt-1">{{ product.title.charAt(0).toUpperCase() }}</span>
                              </div>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="fw-bold text-dark mb-0 text-sm">#{{ product.id }}</span>
                                <h5 class="text-xs text-secondary mb-0">{{ product.title }}</h5>
                              </div>
                            </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs text-secondary mb-0">{{ product.brand }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ product.avg_rating }}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ getCategoryDescription(product.category_id) }}</span>
                        </td>
                        <td class="align-middle text-center" v-if="product.product_market_prices && product.product_market_prices.length > 0">
                          <span class="text-secondary text-xs font-weight-bold">{{ getMarketDescription(product.product_market_prices[0].market_id) ? getMarketDescription(product.product_market_prices[0].market_id) : 'Undefined' }}</span>
                        </td>
                        <td class="align-middle text-center" v-else>
                          <span class="text-secondary text-xs font-weight-bold">Undefined</span>
                        </td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip">
                                <div class="d-flex justify-content-around">
                                    <i class="fas fa-edit" @click.prevent="editProduct(product.id)"></i>
                                    <i class="fas fa-trash" @click.prevent="destroyProduct(product.id)"></i>
                                </div>
                            </a>
                        </td>
                        </tr>
                        <tr v-else>
                            <span class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No products to show</span>
                        </tr>
                    </tbody>
                    </table>
              </div>
            </div>
        </div>
    <div>
      <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="productModalLabel">Product Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form @submit.prevent="submitProduct" method="post">
              <div class="modal-body">
                <div class="row mb-3">
                  <div class="col">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" type="text" v-model="title" id="title" name="title" placeholder="Insert title" required>
                  </div>
                  <div class="col">
                    <label for="brand" class="form-label">Brand</label>
                    <input class="form-control" type="text" v-model="brand" id="brand" name="brand" placeholder="Insert brand" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="category" class="form-label">Category</label>
                        <select class="form-select" v-model="selectedCategory" id="category" name="category" required>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.description }}</option>
                    </select>
                  </div>
                  <div class="col">
                    <label for="rating" class="form-label">Rating (1-5)</label>
                    <input class="form-control" type="number" v-model="rating" id="rating" name="rating" min="1" max="5" placeholder="Insert rating" required>
                  </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label for="productDescription" class="form-label">Description</label>
                  <input class="form-control" type="text" v-model="productDescription" id="productDescription" name="productDescription" placeholder="Insert productDescription" required>
                </div>
              </div>
                <!--  -->
                <div class="infinite-scroll">
                  <div v-for="(row, index) in rowData" :key="index">
                    <div class="border rounded border-secondary p-2 mb-3" :class="{ 'border-success': row.price, 'border-danger': !row.price }">
                      <div class="row mb-3 col-12">
                        <div class="col-2">
                          <label for="market" class="form-label">Market</label>
                          <!-- <input class="form-control" type="text" v-model="row.market" :id="'market' + index" :name="'market' + index" placeholder="Market"> -->
                          <select class="form-select" v-model="selectedMarket" id="market" name="market" placeholder="Market">
                            <option value="">Select Market</option>
                            <option v-for="market in markets" :key="market.id" :value="market.id">{{ market.name }}</option>
                          </select>
                        </div>
                        <div class="col-4">
                          <label for="link" class="form-label">Link</label>
                          <input class="form-control" type="text" v-model="row.link" :id="'link' + index" :name="'link' + index" placeholder="Link">
                        </div>
                        <div class="col-2">
                          <label for="tag" class="form-label">Tag</label>
                          <input class="form-control" type="text" v-model="row.tag" :id="'tag' + index" :name="'tag' + index" placeholder="Tag">
                        </div>
                        <div class="col-2">
                          <label for="price" class="form-label">Price</label>
                          <input class="form-control" type="text" v-model="row.price" :id="'price' + index" :name="'price' + index" placeholder="Price">
                        </div>
                        <div class="col-2 d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                          @click.prevent="handleScraping(row.link, row.tag, index)">
                          <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/>
                        </svg>
                        <i class="fas fa-trash" @click.prevent="removeRow(index)"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center mb-3 text-danger">
                  <span>{{ scrapingError }}</span>
                </div>
                  <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" @click.prevent="addRow">
                    <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                    </svg><br>
                    <span class="text-center">Add Market</span>
                  </div>
              </div>
                <!--  -->
                <div class="alert alert-danger" v-if="errors.length">
                  <ul>
                    <li v-for="error in errors" :key="error">{{ error }}</li>
                  </ul>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" @click.prevent="submitProduct">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import { ref, onMounted } from 'vue';
  import { getProducts, deleteProduct, createProduct, getCategories, updateProduct, createProductMarketPrice, getMarkets } from '@/services/http.js';
  import { scrapPrice } from '@/services/scraper.js';

  export default {
    name: 'ProductsTable',
    setup() {
      const products = ref([]);
      const title = ref('');
      const productDescription = ref('');
      const brand = ref('');
      const rating = ref('');
      const selectedCategory = ref('');
      const errors = ref([]);
      const categories = ref([]);
      const markets = ref([]);
      const categoryId = ref('');
      const productIdToEdit = ref(null);
      const rowData = ref([]);
      const prodPrice = ref('');
      const scrapingError = ref('');
      const selectedMarket = ref('');
      
      const handleScraping = async (link, tag, index) => {
        try {
          prodPrice.value = await scrapPrice(link, tag);
          rowData.value[index].price = prodPrice.value.price;
          
          const marketName = extractMarketName(link);
          rowData.value[index].market = marketName;

          const rowElement = document.getElementById(`row-${index}`);          
        } catch (error) {
          scrapingError.value = 'Error scraping: ' + error.message;
        }
      };

      const extractMarketName = (link) => {
        if (link.startsWith("https://") || link.startsWith("http://")) {
          const withoutProtocol = link.replace(/^(https?:\/\/)/, "");
          
          const domain = withoutProtocol.split("/")[0];
          
          const marketName = domain.split(".")[1];
          
          return marketName.charAt(0).toUpperCase() + marketName.slice(1);
        } else {
          return "Unknown";
        }
      };
      
      const showModal = () => {
        cleanValues();
        productIdToEdit.value = null;
        $('#roleModalLabel').text('Add Product');
        $('#productModal').modal('show');
      };
  
      const fetchProducts = async () => {
        try {
          products.value = await getProducts();
        } catch (error) {
          console.error(error);
        }
      };
    
      const fetchCategories = async () => {
        try {
            categories.value  = await getCategories();
        } catch (error) {
          console.error(error);
        }
      };
      
      const fetchMarkets = async () => {
        try {
            markets.value = await getMarkets();
        } catch (error) {
          console.error(error);
        }
      };

      const submitProduct = async () => {
        errors.value = [];
        if (title.value) {
          if (productIdToEdit.value) {
            try {
              await updateProduct(productIdToEdit.value, {
                title: title.value,
                description: productDescription.value,
                brand: brand.value,
                avg_rating: rating.value,
                category_id: selectedCategory.value
              });
       
              for (const row of rowData.value) {
                if (row.price) {
                  await saveProductMarketPrice(row);
                }
              }

              cleanValues();
              rowData.value = [];
              $('#productModal').modal('hide');
              fetchProducts();
            } catch (error) {
              console.error(error);
            }
          }
          else{
            try {
            await createProduct({
              title: title.value,
              description: productDescription.value,
              brand: brand.value,
              avg_rating: rating.value,
              category_id: selectedCategory.value
            });
            
            cleanValues();
            $('#productModal').modal('hide');
            fetchProducts();
          } catch (error) {
            console.error(error);
          }
        }
        } else {
          if (!title.value) errors.value.push('Title is required');
          if (!productDescription.value) errors.value.push('Description is required');
          if (!brand.value) errors.value.push('Brand is required');
          if (!rating.value) errors.value.push('Rating is required');
          if (!selectedCategory.value) errors.value.push('Category is required');
        }
      };
  
      const destroyProduct = async (id) => {
        try {
          await deleteProduct(id);
          fetchProducts();
        } catch (error) {
          console.error(error);
        }
      };

    const editProduct = async (id) => {
      try {
          productIdToEdit.value = id;
          const product = products.value.find(product => product.id === id);
          if (product) {
              title.value = product.title;
              productDescription.value = product.description;
              brand.value = product.brand;
              rating.value = product.avg_rating;
              selectedCategory.value = product.category_id;
              $('#roleModalLabel').text('Edit Product');
              $('#productModal').modal('show');
          }
      } catch (error) {
          console.error(error);
      }
    };

    const addRow = () => {
      rowData.value.push({
        market: '',
        link: '',
        tag: '',
        price: ''
      });
    };
    
    const removeRow = (index) => {
      rowData.value.splice(index, 1);
      scrapingError.value = '';
    };

    const saveProductMarketPrice = async (row) => {
      try {
        await createProductMarketPrice(
          {
            market_id: selectedMarket.value,
            product_id: productIdToEdit.value,
            price: row.price,
            link: row.link,
            currency: 'EUR', // // mudar depois -> currency padrao -> o scraper tem de scrapar a currency
            tag: row.tag
          }
        );
        
      } catch (error) {
        console.error('Error saving product market price:', error);
      }
    };
    const cleanValues = () => {
      title.value = '';
      productDescription.value = '';
      brand.value = '';
      rating.value = '';
      selectedCategory.value = '';
    }
    
    const getCategoryDescription = (categoryId) => {
        const cat = categories.value.find(cat => cat.id === categoryId);
        return cat ? cat.description : 'Unknown Category';
    };
    
    const getMarketDescription = (market_id) => {
        const market = markets.value.find(market => market.id === market_id);
        return market ? market.name : 'Unknown Market';
    };

    const calculateLinkInfo = () => {
      const linkInfo = {};
      rowData.value.forEach((row, index) => {
        if (row.price) {
          if (!linkInfo[row.link]) {
            linkInfo[row.link] = [];
          }
          linkInfo[row.link].push(`price${index + 1}: ${row.price}`);
        }
      });
      return linkInfo;
    };

    onMounted(() => {
      fetchProducts();
      fetchCategories();
      fetchMarkets();
    });

    return {
      products,
      title,
      productDescription,
      brand,
      rating,
      selectedCategory,
      errors,
      showModal,
      submitProduct,
      destroyProduct,
      categories,
      getProducts,
      deleteProduct,
      createProduct,
      getCategories,
      getCategoryDescription,
      fetchProducts,
      fetchCategories,
      getMarketDescription,
      categoryId,
      editProduct,
      addRow,
      removeRow,
      rowData,
      handleScraping,
      scrapPrice,
      prodPrice,
      scrapingError,
      calculateLinkInfo,
      cleanValues,
      saveProductMarketPrice,
      extractMarketName,
      updateProduct,
      createProductMarketPrice,
      getMarkets,
      fetchMarkets,
      markets,
      selectedMarket
    };
    }
  };
  </script>
  
  <style scoped>
  @import url("../assets/table.css");
  .modal svg{
    height: 50px!important;
    cursor: pointer;
  }
  .infinite-scroll{
    overflow-y: scroll;
    height: 300px;
    scrollbar-width: none;
  }
  </style>  