<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const props = defineProps({
    spotifyToken: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(["currentlyPlaying"]);

const currentlyPlaying = ref(null);
const fetchCurrentlyPlaying = async () => {
    const response = await axios.get("/api/spotify/currently-playing", {
        headers: {
            Authorization: `Bearer ${props.spotifyToken}`,
        },
    });

    if (response.data.is_playing) {
        currentlyPlaying.value = response.data;

        emit("currentlyPlaying", currentlyPlaying.value);

        window.onSpotifyIframeApiReady = (IFrameAPI) => {
            const element = document.getElementById("currently-playing");
            const options = {
                uri: response.data.item.uri,
            };
            const callback = (EmbedController) => {};
            IFrameAPI.createController(element, options, callback);
        };
    }
};

onMounted(() => {
    fetchCurrentlyPlaying();
});
</script>

<template>
    <div v-if="currentlyPlaying">
        <h3
            class="max-w-2xl mb-2 font-light text-gray-500 text-base md:text-lg lg:text-xl"
        >
            I'm even listening to music right now!
        </h3>
        <div id="currently-playing"></div>
    </div>
</template>
