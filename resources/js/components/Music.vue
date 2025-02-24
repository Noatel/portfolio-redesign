<script setup>
import CurrentlyPlaying from "../components/CurrentlyPlaying.vue";
import LastPlayed from "../components/LastPlayed.vue";

import { ref, onMounted } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const { props } = usePage();
const spotifyToken = props.spotifyToken;

const currentlyPlaying = ref(null);

const handleCurrentlyPlaying = (value) => {
    currentlyPlaying.value = value;
};

onMounted(() => {});
</script>

<template>
    <section class="">
        <div class="max-w-screen-xl mx-auto">
            <CurrentlyPlaying
                :spotifyToken="spotifyToken"
                @currentlyPlaying="handleCurrentlyPlaying"
            />
            <LastPlayed v-if="!currentlyPlaying" :spotifyToken="spotifyToken" />
        </div>
    </section>
</template>

<script>
export default {
    name: "Music",
};
</script>
