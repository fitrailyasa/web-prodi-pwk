import '../css/app.css';
import './bootstrap';

import { Ziggy } from '@/ziggy';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
import { useRoute } from 'ziggy-js';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} / ${appName}` : appName),
    resolve: (name) => resolvePageComponent(`./pages/${name}.tsx`, import.meta.glob('./pages/**/*.tsx')),
    setup({ el, App, props }) {
        // @ts-expect-error
        import.meta.env.NODE_ENV !== 'local' ?  window.route = useRoute() : window.route = useRoute();
        const appElement = (
                <App {...props} />
        );

        createRoot(el).render(appElement);
    },
    progress: false
});
