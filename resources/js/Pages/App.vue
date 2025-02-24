<template>
    <section class="bg-white">
        <div
            class="grid max-w-screen-xl px-4 pt-12 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28 mt-12 lg:mt-20"
        >
            <!-- Left Column (Text Content) -->
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-3xl font-extrabold leading-none tracking-tight md:text-4xl lg:text-5xl xl:text-6xl"
                >
                    Hello, <br />

                    I'm
                    <span class="relative whitespace-nowrap text-blue-600">
                        <svg
                            class="absolute top-2/3 left-0"
                            viewBox="-347 -30.1947 694 96.19"
                            aria-hidden="true"
                        >
                            <g id="Page-1" fill="none" fill-rule="evenodd">
                                <path
                                    stroke="#adcdeb"
                                    stroke-width="6"
                                    id="svg-path"
                                    stroke-linecap="round"
                                    d="M-335,54 C-335,54 -171,-58 -194,-3 C-217,52 -224.1199951171875,73.552001953125 -127,11 C-68,-27 -137,50 -33,42 C31.43899917602539,37.042999267578125 147.14700317382812,-29.308000564575195 335,2"
                                ></path>
                            </g>
                        </svg>

                        <span class="relative">Noah Telussa</span>
                    </span>
                </h1>

                <div class="mt-6 lg:mt-10">
                    <p
                        class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 text-base md:text-lg lg:text-xl"
                    >
                        Full-stack developer from Rotterdam who loves building
                        random stuff, playing with APIs, and vibing to music
                    </p>
                </div>
                <div class="sm:flex sm:space-y-0 sm:space-x-4">
                    <Music />
                </div>
            </div>

            <!-- Right Column (Image) -->
            <div
                class="lg:mt-0 lg:col-span-5 lg:flex lg:flex-col items-center mt-8 lg:mt-0"
            >
                <Square />
                <img
                    class="block relative z-2 w-full max-w-md mx-auto lg:max-w-none mt-4"
                    src="../../../public/noah-telussa.png"
                    alt="hero image"
                />
                <div class="relative block mt-4 z-3">
                    <Github />
                    <LinkedIn />
                </div>
            </div>
        </div>
    </section>
    <div class="m-7"></div>
    <Projects />
    <div class="m-20"></div>
</template>

<script>
import Github from "../components/Github.vue";
import LinkedIn from "../components/LinkedIn.vue";
import Square from "../components/Square.vue";
import Projects from "../components/Projects.vue";
import Music from "../components/Music.vue";

export default {
    name: "App",
    components: {
        Projects,
        Github,
        LinkedIn,
        Square,
        Music,
    },
    mounted() {},
};
</script>

<style scoped>
.noah-telussa {
    max-width: 100%;
}
</style>
