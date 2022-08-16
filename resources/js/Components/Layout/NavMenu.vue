<template>
    <ul class="navbar-nav nav-pills">
        <li class="nav-item"  :class="{'active': route().current('index')}">
            <Link class="nav-link" :href="route('index')" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  Ana Sayfa
                </span>
            </Link>
        </li>
        <li class="nav-item"  :class="{'active': route().current('invoice-sale.*')}">
            <Link class="nav-link" :href="route('invoice-sale.index')" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <line x1="12" y1="4" x2="12" y2="14"></line>
   <line x1="12" y1="4" x2="16" y2="8"></line>
   <line x1="12" y1="4" x2="8" y2="8"></line>
   <line x1="4" y1="20" x2="20" y2="20"></line>
</svg>                </span>
                <span class="nav-link-title">
                  Satış Faturaları
                </span>
            </Link>
        </li>
        <li class="nav-item"  :class="{'active': route().current('invoice-purchase.*')}">
            <Link class="nav-link" :href="route('invoice-purchase.index')" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <line x1="12" y1="20" x2="12" y2="10"></line>
   <line x1="12" y1="20" x2="16" y2="16"></line>
   <line x1="12" y1="20" x2="8" y2="16"></line>
   <line x1="4" y1="4" x2="20" y2="4"></line>
</svg>                </span>
                <span class="nav-link-title">
                  Alış Faturaları
                </span>
            </Link>
        </li>
    </ul>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import {WifiIcon,UsersIcon} from "vue-tabler-icons"
</script>

<style scoped>

</style>
