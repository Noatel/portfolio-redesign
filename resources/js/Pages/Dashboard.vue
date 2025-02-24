<script setup>
import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import CurrentlyPlaying from "../components/CurrentlyPlaying.vue";
import LastPlayed from "../components/LastPlayed.vue";

const { props } = usePage();
const spotifyToken = props.spotifyToken;

const currentlyPlaying = ref(null);

const handleCurrentlyPlaying = (value) => {
    currentlyPlaying.value = value;
};

onMounted(() => {});
</script>

<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold">Spotify Status</h1>

        <CurrentlyPlaying
            :spotifyToken="spotifyToken"
            @currentlyPlaying="handleCurrentlyPlaying"
        />
        <LastPlayed v-if="!currentlyPlaying" :spotifyToken="spotifyToken" />
    </div>
</template>
