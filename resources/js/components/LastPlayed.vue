<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const props = defineProps({
    spotifyToken: {
        type: String,
        required: true,
    },
});

const lastPlayed = ref(null);
const playedAtDate = ref(null);
const playedAtTime = ref(null);

const fetchLastPlayed = async () => {
    const response = await axios.get("/api/spotify/last-played", {
        headers: {
            Authorization: `Bearer ${props.spotifyToken}`,
        },
    });

    lastPlayed.value = response.data;
    const playedAt = new Date(response.data.items[0].played_at);
    playedAtDate.value = playedAt.toLocaleDateString();
    playedAtTime.value = playedAt.toLocaleTimeString([], {
        hour: "2-digit",
        minute: "2-digit",
    });

    window.onSpotifyIframeApiReady = (IFrameAPI) => {
        const element = document.getElementById("last-played");
        const options = {
            uri: response.data.items[0].track.uri,
        };
        const callback = (EmbedController) => {};
        IFrameAPI.createController(element, options, callback);
    };
};

onMounted(() => {
    fetchLastPlayed();
});
</script>

<template>
    <div v-if="lastPlayed">
        <p
            class="max-w-2xl font-light text-gray-500 mb-2 text-base md:text-lg lg:text-xl"
        >
            Not listening right now but last song i played was:
        </p>

        <div id="last-played"></div>
    </div>
</template>
