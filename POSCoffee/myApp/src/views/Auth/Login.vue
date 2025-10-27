<template>
  <ion-page>
    
    <div class="login-container">
      <form  @submit.prevent="login">
        <div class="center">
          <h1 style="font-weight: bold;">{{t ("Login")}}</h1>
          <p :v-model="email">{{ email }}</p>
          <p>{{t("Username")}}</p>
          <input type="text" v-model="email" :placeholder="t('Input Your Username')" required />

          <p>{{t("Password")}}</p>
          <p :v-model="password">{{ password }}</p>
          <input type="password" v-model="password" :placeholder="t('Input Your Password')"  required />

          <button type="submit" class="btnSubmit">{{t("Save")}}</button>
        </div>
      </form>
    </div>
  </ion-page>
</template>

<script setup lang="ts">
import router from '@/router';
import axios from 'axios';
import { onMounted, ref } from 'vue';
const t = window.t

const email = ref('');
const password = ref('');

const data = ref();

async function login(){
  const res = await axios.post('http://127.0.0.1:8000/api/user',{
    email: email.value,
    password: password.value
  });
  if(res.data){
      data.value = res.data
      router.push('/home')
  }
   else {
      alert(t("Invalid username or password"));
    }
}

 


</script>

<style scoped>

.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(135deg, #d7f8e4, #f0fff4);
  font-family: "Poppins", sans-serif;
}


.center {
  background-color: #fff;
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 100%;
  max-width: 360px;
}


.center h1 {
  font-size: 26px;
  margin-bottom: 20px;
  color: #2e7d32;
}

.center p {
  text-align: left;
  font-weight: 500;
  color: #333;
  margin: 10px 0 5px;
}

.center input {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  outline: none;
  transition: all 0.3s ease;
}

.center input:focus {
  border-color: #4caf50;
  box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
}

.btnSubmit {
  width: 100%;
  font-size: 15px;
  margin-top: 18px;
  background-color: #4caf50;
  padding: 10px;
  border: none;
  color: white;
  font-weight: 600;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btnSubmit:hover {
  background-color: #388e3c;
  transform: translateY(-2px);
}


@media (max-width: 480px) {
  .center {
    width: 90%;
    padding: 20px;
  }
}
</style>
