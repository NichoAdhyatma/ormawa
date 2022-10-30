import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import AOS from "aos";
import "aos/dist/aos.css";
import { OhVueIcon, addIcons } from "oh-vue-icons";
import { BiPersonFill, IoNotificationsSharp } from "oh-vue-icons/icons";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component("v-icon", OhVueIcon)
            .mount(el);
    },
});

AOS.init();
addIcons(BiPersonFill, IoNotificationsSharp);
InertiaProgress.init({ color: "#4B5563" });
