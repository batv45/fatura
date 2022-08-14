<template>
    <form @submit.prevent="submitForm" class="card">
        <div class="card-header">
            <div>
                <h3 class="card-title">E-Arşiv Bilgileri</h3>
                <p class="card-subtitle">İnteraktif kullanıcı giriş bilgileri ile.</p>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <FormInput label="İnteraktif Kullanıcı Kodu" v-model="form_settings.ivd_user" :error="form_settings.errors.ivd_user"></FormInput>
                </div>
                <div class="col-md-6">
                    <FormInput label="İnteraktif Kullanıcı Şifresi" v-model="form_settings.ivd_pass" :error="form_settings.errors.ivd_pass"></FormInput>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" :class="{'btn-loading': form_settings.processing}" class="btn btn-primary"> <CheckIcon/> Kaydet</button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import FormInput from "@/Components/Form/Input.vue";
import {CheckIcon, AlertTriangleIcon, UploadIcon} from "vue-tabler-icons"

const props = defineProps({
    user: {
        type: Object,
        required: true
    },
    settings: {
        type: Object,
        required: true
    }
})

const form_settings = useForm({
    ivd_user: props.settings.earsiv?.ivd_user,
    ivd_pass: props.settings.earsiv?.ivd_pass
})

function submitForm(){
    form_settings.put(route('account.settings.update'))
}
</script>
