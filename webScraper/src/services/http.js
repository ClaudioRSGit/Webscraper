import axios from 'axios'

const axiosInstance = axios.create({
    baseURL: 'http://localhost:8000/api',
    headers: {
        'Content-type': 'application/json'
    },
    withCredentials: true
})
// Register function
export const registerUser = async (userData) => {
  try {
      const response = await axiosInstance.post('/register', userData);
      return response.data;
  } catch (error) {
      console.error(error);
  }
};

// Login function
export const loginUser = async (userData) => {
  try {
      const response = await axiosInstance.post('/auth', userData);
      return response.data;
  } catch (error) {
      console.error(error);
  }
};
//get functions
export const getCategories = async () => {
    try {
      const response = await axiosInstance.get('/categories');
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
};

export const getUsers = async () => {
    try {
      const response = await axiosInstance.get('/users');
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
};

export const getRoles = async () => {
    try {
      const response = await axiosInstance.get('/roles');
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
};

export const getProducts = async () => {
    try {
      const response = await axiosInstance.get('/products');
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
};
export const getProductsById = async (id) => {
  try {
    const response = await axiosInstance.get('/product/' + id);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};
export const getMarkets = async () => {
    try {
      const response = await axiosInstance.get('/markets');
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
};
export const getPendingProducts = async () => {
  try {
    const response = await axiosInstance.get('/pendingProducts');
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};
export const getPriceHistoryById = async (id) => {
  try {
    const response = await axiosInstance.get(`/priceHistoryById/${id}`);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
}
//post functions
export const createCategory = async (newCategory) => {
    try {
    const response = await axiosInstance.post('/createCategory', newCategory);
    return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
  };

export const createUsers = async (newUser) => {
    try {
    const response = await axiosInstance.post('/createUser', newUser);
    return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
};

export const createRole = async (newRole) => {
  try {
    const response = await axiosInstance.post('/createRole', newRole);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const createMarket = async (newMarket) => {
  try {
      const response = await axiosInstance.post('/createMarket', newMarket);
      return response.data;
  } catch (error) {
      console.error(error);
      throw error;
  }
};

export const createProduct = async (newProduct) => {
  try {
      const response = await axiosInstance.post('/createProduct', newProduct);
      return response.data;
  } catch (error) {
      console.error(error);
      throw error;
  }
};
export const createProductMarketPrice = async (newProductMarketPrice) => {
  try {
      const response = await axiosInstance.post('/productMarketPrices', newProductMarketPrice);
      console.log('dados recolhidos: ' + response.data);
      return response.data;
  } catch (error) {
      console.error(error);
      throw error;
  }
};

//delete functions
export const deleteUser = async (id) => {
    try {
      const response = await axiosInstance.delete('/destroyUser/'+id);
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
}

export const deleteCategory = async (id) => {
    try {
      const response = await axiosInstance.delete('/destroyCategory/'+id);
      return response.data;
    } catch (error) {
      console.error(error);
      throw error;
    }
}

export const deleteRole = async (id) => {
  try {
    const response = await axiosInstance.delete('/destroyRole/' + id);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const deleteMarket = async (id) => {
  try {
      const response = await axiosInstance.delete('/destroyMarket/' + id);
      return response.data;
  } catch (error) {
      console.error(error);
      throw error;
  }
};
export const deleteProduct = async (id) => {
  try {
      const response = await axiosInstance.delete('/destroyProduct/' + id);
      return response.data;
  } catch (error) {
      console.error(error);
      throw error;
  }
};
export const deletePendingProduct = async (id) => {
  try {
    const response = await axiosInstance.delete(`/destroyPendingProduct/${id}`);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};
//put functions
export const updateRole = async (id, updatedRoleData) => {
  try {
    const response = await axiosInstance.put(`/updateRole/${id}`, updatedRoleData);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};
export const updateCategory = async (id, updatedCategoryData) => {
  try {
    const response = await axiosInstance.put(`/updateCategory/${id}`, updatedCategoryData);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};
export const updateMarket = async (id, updatedMarketData) => {
  try {
    const response = await axiosInstance.put(`/updateMarket/${id}`, updatedMarketData);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export const updateProduct = async (id, updatedProductData) => {
  try {
    const response = await axiosInstance.put(`/updateProduct/${id}`, updatedProductData);
    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};
export default axiosInstance;
