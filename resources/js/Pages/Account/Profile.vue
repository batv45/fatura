<template>
    <AppLayout title="Hesabım">
        <PageHeader title="Hesabım"> </PageHeader>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <TabProfile :user="user"></TabProfile>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <TabSettings :user="user" :settings="page_user_settings"></TabSettings>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
import TabProfile from "@/Pages/Account/Components/TabProfile.vue";
import TabSettings from "@/Pages/Account/Components/TabSettings.vue";

export default {
    name: "Profile",
    components: {TabSettings, TabProfile, PageHeader, AppLayout},
    props:{
        user:Object,
        page_user_settings: Object
    },
    data(){
        return {

        }
    }
}
</script>
