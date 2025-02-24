<template>
    <section class="py-8 sm:py-12">
        <div class="max-w-screen-xl mx-auto">
            <div class="mr-auto place-self-center lg:col-span-7">
                <div class="grid md:grid-cols-1 md:grid-cols-3 gap-4 w-full">
                    <div class="md:col-span-2 p-4">
                        <h2
                            class="inline-block max-w-2xl mb-4 text-3xl font-extrabold leading-none tracking-tight md:text-4xl lg:text-5xl xl:text-6xl"
                        >
                            Supermarkie
                        </h2>
                        <p class="mt-4 text-sm sm:text-base text-gray-700">
                            Besides my GitHub projects, I’m currently working on
                            a personal project called Supermarkie. It’s a
                            platform designed to improve the ordering system for
                            supermarkets like Albert Heijn. The current system
                            only allows one computer or account to place orders,
                            which creates inefficiencies. Groups can only add
                            items to the shopping list if they share login
                            credentials or gather around a single computer.
                            Supermarkie solves this by enabling teams to
                            collaborate on grocery shopping without sharing
                            sensitive account details.
                            <br /><br />
                            It's like Uber Eats group order but for groceries!
                            <br /><br />
                            <a
                                href="https://supermarkie.nl/"
                                target="_blank"
                                class="text-blue-600 visited:text-purple-600"
                            >
                                Supermarkie.nl
                            </a>
                        </p>
                    </div>
                    <div class="md:col-span-1 flex justify-center">
                        <img
                            class="supermarkie max-w-full h-auto"
                            src="../../../public/supermarkie.png"
                            alt="hero image"
                        />
                    </div>
                </div>
            </div>

            <div class="m-10"></div>

            <h3
                class="p-4 inline-block mt-4 max-w-3xl mb-4 text-2xl font-extrabold leading-none tracking-tight md:text-2xl lg:text-2xl xl:text-2xl"
            >
                Albert-heijn-api-client
            </h3>
            <p class="p-4 mt-4 text-sm sm:text-base text-gray-700">
                As part of this project, I reverse-engineered the Albert Heijn
                API and developed the albert-heijn-api-client. Since the API
                isn’t publicly documented, my focus has been on improving its
                usability and making it more accessible. With this client, I can
                easily search for products, add items to the basket, retrieve
                products from different categories, and access recipes. The
                project is currently private, but I may make it public in the
                future.
                <br /><br />
                <b
                    >Currently this project is still private but maybe public in
                    the future</b
                >
            </p>
        </div>
    </section>
</template>

<script>
export default {
    name: "Projects",
};
</script>
