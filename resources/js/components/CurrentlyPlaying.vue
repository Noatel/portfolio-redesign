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

const emit = defineEmits(["currentlyPlaying"]);

const currentlyPlaying = ref(null);
const loading = ref(true);

const fetchCurrentlyPlaying = async () => {
    const response = await axios.get("/api/spotify/currently-playing", {
        headers: {
            Authorization: `Bearer ${props.spotifyToken}`,
        },
    });

    if (response.data.is_playing) {
        currentlyPlaying.value = response.data;
        emit("currentlyPlaying", currentlyPlaying.value);

        window.onSpotifyIframeApiReady = async (IFrameAPI) => {
            await nextTick(); // Wait for the DOM to update
            const element = document.getElementById("currently-playing");
            if (element) {
                const options = {
                    uri: response.data.item.uri,
                    height: 0,
                    width: 0,
                };
                const callback = (EmbedController) => {
                    EmbedController.addListener("ready", () => {
                        loading.value = false;
                        const iframe =
                            document.getElementsByTagName("iframe")[0];
                        if (iframe) {
                            iframe.style.width = "100%";
                            iframe.style.height = "80px";
                        }
                    });
                };
                IFrameAPI.createController(element, options, callback);
            } else {
                console.error("Element with ID 'currently-playing' not found.");
            }
        };
    } else {
        loading.value = false; // Set loading to false if not playing
    }
};

onMounted(() => {
    fetchCurrentlyPlaying();
});
</script>

<template>
    <div v-if="currentlyPlaying" class="relative">
        <p
            class="max-w-2xl mb-2 font-light text-gray-500 text-base md:text-lg lg:text-xl"
        >
            I'm even listening to music right now!
        </p>

        <div
            id="currently-playing"
            class="absolute inset-0 transition-opacity duration-500"
            :class="{ 'opacity-0': loading, 'opacity-100': !loading }"
        ></div>
        <content-loader
            v-if="loading"
            width="100%"
            height="100px"
            :speed="0.6"
            id="currently-playing-loader"
            class="absolute inset-0 transition-opacity duration-500"
            :class="{ 'opacity-100': loading, 'opacity-0': !loading }"
        >
            <rect width="100%" height="100px" />
        </content-loader>
    </div>
</template>

<script>
export default {
    name: "CurrentlyPlaying",
    components: {
        ContentLoader,
    },
};
</script>
