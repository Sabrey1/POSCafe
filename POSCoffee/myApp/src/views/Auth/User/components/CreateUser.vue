<template>
    <div>
        <h2 class="mb-2 text-center">{{t("Add Category")}}</h2>
        <ion-grid>
            <ion-row>
                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Name')" label-placement="floating" fill="outline" :placeholder="t('Enter name')"></ion-input>
                    </ion-item>
                </ion-col>

                <ion-col>
                    <ion-item lines="none">
                        <ion-input :label="t('Email')" label-placement="floating" fill="outline" :placeholder="t('Enter Email')"></ion-input>
                    </ion-item>
                </ion-col>
            </ion-row>
            <ion-row>
                <ion-col>
                      <ion-item lines="none">
                        <ion-input :label="t('Password')" label-placement="floating" fill="outline" :placeholder="t('Enter Password')"></ion-input>
                    </ion-item>
                </ion-col>

                <ion-col>
                   <ion-item lines="none">
              <ion-select
                aria-label="role"
                fill="outline"
                interface="popover"
                :placeholder="t('Select Role')"
              >
                <ion-select-option value="Regular">{{ t("Manager") }}</ion-select-option>
                <ion-select-option value="Vip">{{ t("User") }}</ion-select-option>
              </ion-select>
            </ion-item>
                </ion-col>
            </ion-row>
             <br>
                <ion-button expand="block" color="primary" @click="addCategory">{{t("Save")}}</ion-button>
            
        </ion-grid>
    </div>
</template>

<script setup>


const t = window.t
</script>