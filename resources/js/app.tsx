import '../css/app.css'
import './bootstrap'

import { Ziggy } from '@/ziggy'
import { createInertiaApp } from '@inertiajs/react'
import { NextUIProvider } from '@nextui-org/react'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import React from 'react'
import { createRoot } from 'react-dom/client'
import { useRoute } from 'ziggy-js'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

createInertiaApp({
    title: title => (title ? `${title} / ${appName}` : appName),
    resolve: name =>
        resolvePageComponent(
            `./pages/${name}.tsx`,
            import.meta.glob('./pages/**/*.tsx'),
        ),
    setup({ el, App, props }) {
        import.meta.env.NODE_ENV !== 'local'
            ? (Ziggy.url = 'http://localhost:8000')
            : Ziggy.url
        // @ts-expect-error
        window.route = useRoute()
        const appElement = (
            <React.StrictMode>
                <NextUIProvider>
                    <App {...props} />
                </NextUIProvider>
            </React.StrictMode>
        )
        createRoot(el).render(appElement)
    },
    progress: false,
})
