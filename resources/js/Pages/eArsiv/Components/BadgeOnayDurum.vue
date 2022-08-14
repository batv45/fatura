<template>
    <span class="badge badge-pill "
    :class="{
           'bg-success': durum === 'Onaylandı',
           'bg-red': durum === 'Silinmiş',
    }">{{durum}}</span>
</template>

<script setup>
defineProps({
    durum:String
})
</script>
