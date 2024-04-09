<template>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="">
            <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Products</p>
                    <h5 class="font-weight-bolder">
                      {{ apiData.products }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <img src="https://www.svgrepo.com/show/2151/refrigerator.svg" style="width: 30px; margin-top: 10px;">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div></a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="/">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Active Users</p>
                    <h5 class="font-weight-bolder">
                      {{ apiData.users }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="margin-left: 10px;"><path fill="#000" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <a href="/">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Products</p>
                    <h5 class="font-weight-bolder">
                      {{ apiData.pendingProducts }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <img src="https://www.svgrepo.com/show/2151/refrigerator.svg" style="width: 30px; margin-top: 10px;">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-xl-3 col-sm-6">
          <a href="/">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Scraped Markets</p>
                    <h5 class="font-weight-bolder">
                      {{ apiData.markets }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="margin-left: 10px;"><path fill="#000" d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>
      
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-4">Sales by Country</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div>
                          <img src="https://cdn.britannica.com/33/4833-004-828A9A84/Flag-United-States-of-America.jpg" alt="Country flag">
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Country:</p>
                          <h6 class="text-sm mb-0">United States</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                        <h6 class="text-sm mb-0">2500</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                        <h6 class="text-sm mb-0">$230,900</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                        <h6 class="text-sm mb-0">29.9%</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div>
                          <img src="https://cdn.britannica.com/33/4833-004-828A9A84/Flag-United-States-of-America.jpg" alt="Country flag">
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Country:</p>
                          <h6 class="text-sm mb-0">Germany</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                        <h6 class="text-sm mb-0">3.900</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                        <h6 class="text-sm mb-0">$440,000</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                        <h6 class="text-sm mb-0">40.22%</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div>
                          <img src="data:image/png;base64,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" alt="Country flag">
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Country:</p>
                          <h6 class="text-sm mb-0">Great Britain</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                        <h6 class="text-sm mb-0">1.400</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                        <h6 class="text-sm mb-0">$190,700</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                        <h6 class="text-sm mb-0">23.44%</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div>
                          <img src="data:image/png;base64,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" alt="Country flag">
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Country:</p>
                          <h6 class="text-sm mb-0">Brasil</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                        <h6 class="text-sm mb-0">562</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                        <h6 class="text-sm mb-0">$143,960</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                        <h6 class="text-sm mb-0">32.14%</h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Categories</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height: 15px;"><path fill="#fff" d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{ apiData.categories[0] }}</h6>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height: 15px;"><path fill="#fff" d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{ apiData.categories[1] }}</h6>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height: 15px;"><path fill="#fff" d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{ apiData.categories[2] }}</h6>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height: 15px;"><path fill="#fff" d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{ apiData.categories[3] }}</h6>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="height: 15px;"><path fill="#fff" d="M36.8 192H603.2c20.3 0 36.8-16.5 36.8-36.8c0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7c-4 6.1-6.2 13.2-6.2 20.4C0 175.5 16.5 192 36.8 192zM64 224V384v80c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V384 224H320V384H128V224H64zm448 0V480c0 17.7 14.3 32 32 32s32-14.3 32-32V224H512z"/></svg>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{ apiData.categories[4] }}</h6>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import axiosInstance from '@/services/http';

export default {
  data() {
    return {
      apiData: []
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const response = await axiosInstance.get('/dashboard');
        const data = await response.data;
        this.apiData = data;
      } catch (error) {
        console.error('Erro ao buscar dados da API:', error);
      }
    }
  }
};
</script>

<style scoped>
@import url('../assets/argon-dashboard.css');

table{
  color: darkgray!important;
}
.table-responsive img{
  height: 30px;
  width: 30px;
  object-fit: cover;
  border-radius: 50%;
}
.card{
  min-height: 100%;
}
h5{
  color: blue;
}
</style>