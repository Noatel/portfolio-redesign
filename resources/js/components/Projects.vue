<template>
    <div class="grid sm:grid-cols-2 gap-4">
        <!-- Supermarkie Card -->
        <div
            class="flex flex-col border border-zinc-800 rounded-xl p-6 bg-zinc-900/20 hover:border-zinc-700 hover:bg-zinc-900/50 transition-all duration-200"
        >
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h3 class="text-base font-semibold text-white">
                        Supermarkie
                    </h3>
                    <p class="text-xs text-zinc-600 mt-0.5">Personal project</p>
                </div>
                <img
                    src="../../../public/supermarkie.png"
                    alt="Supermarkie mascot"
                    class="w-11 h-11 rounded-lg object-cover"
                />
            </div>

            <p class="text-sm text-zinc-400 leading-relaxed mb-5 flex-1">
                A platform for collaborative supermarket ordering, like Uber
                Eats group order but for groceries. Teams can add items to a
                shared list without sharing Albert Heijn login credentials.
            </p>

            <div class="flex flex-wrap gap-1.5 mb-5">
                <span
                    v-for="tag in supermarkieTags"
                    :key="tag"
                    class="px-2 py-0.5 text-xs text-zinc-500 border border-zinc-800 rounded"
                >
                    {{ tag }}
                </span>
            </div>

            <a
                href="https://supermarkie.nl/"
                target="_blank"
                class="inline-flex items-center gap-1.5 text-sm text-zinc-400 hover:text-white transition-colors"
            >
                supermarkie.nl
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-3.5 h-3.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                    />
                </svg>
            </a>
        </div>

        <!-- Feedie Card -->
        <div
            class="flex flex-col border border-zinc-800 rounded-xl p-6 bg-zinc-900/20 hover:border-zinc-700 hover:bg-zinc-900/50 transition-all duration-200"
        >
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h3 class="text-base font-semibold text-white">Feedie</h3>
                    <p class="text-xs text-zinc-600 mt-0.5">Personal project</p>
                </div>
                <img
                    src="../../../public/feedie-transparent.png"
                    alt="Feedie mascot"
                    class="w-11 h-11 rounded-lg object-cover"
                />
            </div>

            <p class="text-sm text-zinc-400 leading-relaxed mb-5 flex-1">
                A social media scheduling tool that connects directly to the
                Meta API. Plan and schedule your Facebook posts as far ahead as
                you want, no more one-month limits.
            </p>

            <div class="flex flex-wrap gap-1.5 mb-5">
                <span
                    v-for="tag in feedieTags"
                    :key="tag"
                    class="px-2 py-0.5 text-xs text-zinc-500 border border-zinc-800 rounded"
                >
                    {{ tag }}
                </span>
            </div>

            <a
                href="https://feedie.nl/"
                target="_blank"
                class="inline-flex items-center gap-1.5 text-sm text-zinc-400 hover:text-white transition-colors"
            >
                feedie.nl
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-3.5 h-3.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                    />
                </svg>
            </a>
        </div>

        <!-- Albert Heijn API Client Card -->
        <div
            class="flex flex-col border border-zinc-800 rounded-xl p-6 bg-zinc-900/20 hover:border-zinc-700 hover:bg-zinc-900/50 transition-all duration-200"
        >
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h3 class="text-base font-semibold text-white">
                        albert-heijn-api-client
                    </h3>
                    <p class="text-xs text-zinc-600 mt-0.5">PHP library</p>
                </div>
                <div
                    class="w-11 h-11 rounded-lg bg-zinc-800/80 border border-zinc-700 flex items-center justify-center text-zinc-400 shrink-0"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>
                </div>
            </div>

            <p class="text-sm text-zinc-400 leading-relaxed mb-5 flex-1">
                A PHP client for the undocumented Albert Heijn API, built
                through reverse engineering. Enables product search, basket
                management, category browsing, and recipe access.
            </p>

            <div class="flex flex-wrap gap-1.5 mb-5">
                <span
                    v-for="tag in ahTags"
                    :key="tag"
                    class="px-2 py-0.5 text-xs text-zinc-500 border border-zinc-800 rounded"
                >
                    {{ tag }}
                </span>
            </div>

            <span
                class="inline-flex items-center gap-1.5 text-sm text-zinc-600 cursor-default select-none"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-3.5 h-3.5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                    />
                </svg>
                Private - may open source in the future
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Projects",
    data() {
        return {
            supermarkieTags: ["Laravel", "PHP", "Tailwind CSS", "MySQL"],
            ahTags: ["PHP", "Reverse Engineering", "REST API", "Composer"],
            feedieTags: ["Laravel", "PHP", "Tailwind CSS", "Meta API", "MySQL"],
        };
    },
};
</script>
