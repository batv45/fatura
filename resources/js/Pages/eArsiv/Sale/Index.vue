<template>
    <AppLayout title="Satış Faturaları">
        <PageHeader title="Satış Faturaları" sub-title="eArsiv sisteminde kayıtlı faturalarınız."></PageHeader>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tarih Sorgula</h3>
                        <div class="card-actions">
                            <button class="btn me-2" @click.prevent="searchClear"><x-icon class="text-danger"/> Temizle</button>
                            <button class="btn btn-primary" @click.prevent="searchWithDate"><SearchIcon/> Sorgula</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mb-2 mb-md-0">
                                <Label>Başlangıç Tarih:</Label>
                                <Datepicker v-model="startDate"
                                            :enableTimePicker="false"
                                            autoApply
                                            :closeOnAutoApply="false"
                                            locale="tr-TR"
                                            previewFormat="dd-MM-yyyy"
                                            monthNameFormat="short"
                                            format="dd-MM-yyyy"></Datepicker>
                            </div>
                            <div class="col-md-2  mb-2 mb-md-0">
                                <Label>Bitiş Tarih:</Label>
                                <Datepicker v-model="endDate"
                                            :enableTimePicker="false"
                                            autoApply
                                            :closeOnAutoApply="false"
                                            locale="tr-TR"
                                            previewFormat="dd-MM-yyyy"
                                            monthNameFormat="short"
                                            format="dd-MM-yyyy"></Datepicker>
                            </div>
                            <div class="col-md-auto text-center text-md-start">
                                <div class="mb-2">
                                    <a href="#" @click.prevent="buAy" class="btn me-2">Bu Ay</a>
                                    <a href="#" @click.prevent="gecenAy" class="btn">Geçen Ay</a>
                                </div>
                                <div>
                                    <a href="#" @click.prevent="buYil" class="btn me-2">Bu Yıl</a>
                                    <a href="#" @click.prevent="gecenYil" class="btn">Geçen Yıl</a>
                                </div>
                            </div>
                            <div class="col-md-4 align-self-end">
                                <FormInput label="Ara" v-model="searchText"></FormInput>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-nowrap card-table">
                            <thead>
                            <tr>
                                <th class="w-1 d-none d-md-table-cell">Tarih</th>
                                <th class="w-1 d-none d-md-table-cell">Belge Nu.</th>
                                <th class="w-1 d-none d-md-table-cell">Alıcı TCKN./VN.</th>
                                <th class="">Belge</th>
                                <th class="d-none d-md-table-cell">Durum</th>
                                <th class="w-1"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="invoice in searchResult">
                                <td class="d-none d-md-table-cell">{{ invoice.belgeTarihi }}</td>
                                <td class="d-none d-md-table-cell">{{ invoice.belgeNumarasi }}</td>
                                <td class="d-none d-md-table-cell">{{ invoice.aliciVknTckn }}</td>
                                <td class="text-wrap">
                                    <div class="d-block d-md-inline text-muted">
                                        <span class="badge me-2">{{ invoice.belgeTuru }}</span>
                                        <span class=" d-inline d-md-none">{{ invoice.belgeNumarasi }}</span>
                                    </div>
                                    <div class="d-block mt-1 d-md-inline">
                                        {{ invoice.aliciUnvanAdSoyad }}
                                    </div>
                                </td>
                                <td class="d-none d-md-table-cell"><BadgeOnayDurum :durum="invoice.onayDurumu"/></td>
                                <td>
                                    <div class="d-none d-md-block btn-group">
                                        <a :href="route('invoice.pdf',invoice.ettn)" target="_blank" class="btn btn-pill btn-pink">PDF</a>
                                        <a :href="route('invoice.html',invoice.ettn)" target="_blank" class="btn btn-pill">HTML</a>
                                    </div>
                                    <div class="d-md-none btn-group btn-group-vertical">
                                        <a :href="route('invoice.pdf',invoice.ettn)" target="_blank" class="btn btn-pink">PDF</a>
                                        <a :href="route('invoice.html',invoice.ettn)" target="_blank" class="btn">HTML</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Görüntülenecek sonuç yok.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import {XIcon,SearchIcon} from "vue-tabler-icons"

import AppLayout from "@/Layouts/AppLayout.vue";
import PageHeader from "@/Components/Layout/PageHeader.vue";
import Label from "@/Components/Form/Label.vue"

import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import {computed, ref, watch} from "vue";
import {useMoment} from "@/src/useMoment";
import {Link} from "@inertiajs/inertia-vue3"
import {Inertia} from "@inertiajs/inertia";
import FormInput from "@/Components/Form/Input.vue";
import {throttle} from "lodash";
import BadgeOnayDurum from "@/Pages/eArsiv/Components/BadgeOnayDurum.vue";

const props = defineProps({
    page_invoices: Object
})

const startDate = ref(useMoment())
const endDate = ref(useMoment())
const searchText = ref(null)

const searchResult = computed(() => {
    if( searchText.value ){
        return props.page_invoices.filter(f =>
            f.aliciUnvanAdSoyad.toLocaleLowerCase('tr-TR').includes(searchText.value.toLocaleLowerCase('tr-TR')) ||
            f.aliciVknTckn.includes(searchText.value) ||
            f.belgeNumarasi.includes(searchText.value)
        )
    }else
        return props.page_invoices
})

function getStartDate() {
    return startDate.value.format('DD-MM-yyyy')
}
function getEndDate() {
    return endDate.value.format('DD-MM-yyyy')
}

function searchWithDate() {
    if( startDate.value && endDate.value ){
        Inertia.reload({
            data:{
                startDate: getStartDate(),
                endDate: getEndDate()
            }
        })
    }
}
function searchClear() {
    Inertia.get(route(route().current()))
}

function buAy() {
    startDate.value = useMoment().startOf('month')
    endDate.value = useMoment().endOf('month')
    searchWithDate()
}
function gecenAy() {
    startDate.value = useMoment().subtract(1,'month').startOf('month')
    endDate.value = useMoment().subtract(1,'month').endOf('month')
    searchWithDate()
}
function buYil() {
    startDate.value = useMoment().startOf('year')
    endDate.value = useMoment().endOf('year')
    searchWithDate()
}
function gecenYil() {
    startDate.value = useMoment().subtract(1,'year').startOf('year')
    endDate.value = useMoment().subtract(1,'year').endOf('year')
    searchWithDate()
}

</script>
