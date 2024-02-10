<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import AppNavbar from './components/AppNavbar.vue';
import SidebarLeft from './components/SidebarLeft.vue';
import SidebarRight from './components/SidebarRight.vue';
import AppFooter from './components/AppFooter.vue';
import { useAuthUserStore } from './stores/AuthUserStore';

const authUserStore = useAuthUserStore();
authUserStore.getAuthUser();

const settings = ref(null);
const fetchSettings = () => {
    axios.get('/api/settings')
        .then((response) => {
            settings.value = response.data
        })
}

const user = ref(null)
const fetchUser = () => {
    axios.get('/api/profile')
        .then((response) => {
            user.value = response.data
        })
}

onMounted(() => {
    fetchUser();
    fetchSettings();
})
</script>
<template>
    <AppNavbar />
    <SidebarLeft :user="user" :settings="settings" />
    <div class="content-wrapper">
        <router-view></router-view>
    </div>
    <SidebarRight />
    <AppFooter :settings="settings"/>
</template>