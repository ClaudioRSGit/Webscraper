<template>
    <div class="verification-container">
      <div class="verification-card">
        <h1>Código de Verificação</h1>
        <form @submit.prevent="submitVerification" method="post">
          <div class="form-group mt-3">
            <label for="code">Insira o código de 6 digitos que recebeu no email.</label>
            <input type="text" id="code" v-model="verificationCode" class="form-control mt-3" maxlength="6">
          </div>
          <button type="submit" class="btn btn-danger w-100 mt-3">Submit</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import axiosInstance from '@/services/http';

  export default {
    name: 'Verification',
    data() {
      return {
        verificationCode: ''
      };
    },
    methods: {
        async submitVerification() {
            try {
            console.log("Código de verificação enviado:", this.verificationCode);
            const response = await axiosInstance.post(`/auth/verification/${this.verificationCode}`);

            if (response.status === 200) {
                this.$router.push('/');
            } else {
                console.error('Erro ao verificar código:', response.data.message);
                this.$router.push('/login');
            }
            } catch (error) {
            console.error('Erro ao verificar código:', error);
            }
        }
        }
}
  </script>
  
  <style scoped>
  .verification-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
  }
  
  .verification-card {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 30%;
  }
    
  input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    color: red;
    border-radius: 5px;
    font-weight: 700;
    text-align: center;
  }
  
  button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #a52e2e;
  }
  </style>
  