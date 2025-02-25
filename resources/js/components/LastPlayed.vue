<script setup>
import { ref, onMounted, nextTick } from "vue";
import axios from "axios";
import { ContentLoader } from "vue-content-loader";

const props = defineProps({
    spotifyToken: {
        type: String,
        required: true,
    },
});

const lastPlayed = ref(null);
const playedAtDate = ref(null);
const playedAtTime = ref(null);
const loading = ref(true);

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

    window.onSpotifyIframeApiReady = async (IFrameAPI) => {
        await nextTick(); // Wait for the DOM to update
        const element = document.getElementById("last-played");
        if (element) {
            const options = {
                uri: response.data.items[0].track.uri,
            };
            const callback = (EmbedController) => {
                EmbedController.addListener("ready", () => {
                    loading.value = false;
                    const iframe = document.getElementsByTagName("iframe")[0];
                    if (iframe) {
                        iframe.style.width = "100%";
                        iframe.style.height = "80px";
                    }
                });
            };
            IFrameAPI.createController(element, options, callback);
        } else {
            console.error("Element with ID 'last-played' not found.");
        }
    };
};

onMounted(() => {
    fetchLastPlayed();
});
</script>

<template>
    <div v-if="lastPlayed" class="relative">
        <p
            class="max-w-2xl mb-2 font-light text-gray-500 text-base md:text-lg lg:text-xl"
        >
            Not listening right now but last song I played was:
        </p>

        <div
            id="last-played"
            class="absolute inset-0 transition-opacity duration-500"
            :class="{ 'opacity-0': loading, 'opacity-100': !loading }"
        ></div>
        <content-loader
            v-if="loading"
            width="100%"
            height="100px"
            id="last-played-loader"
            :speed="0.6"
            class="absolute inset-0 transition-opacity duration-500"
            :class="{ 'opacity-100': loading, 'opacity-0': !loading }"
        >
            <rect width="100%" height="100px" />
        </content-loader>
    </div>
</template>

<script>
export default {
    name: "LastPlayed",
    components: {
        ContentLoader,
    },
};
</script>
