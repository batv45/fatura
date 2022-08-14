<template>
    <AppLayout title="Ana Sayfa">
        <PageHeader title="başlık" sub-title="alt başlık" />
        <pre>{{$page.props.user}}</pre>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
</script>

