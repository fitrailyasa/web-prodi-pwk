import '../css/app.css'
import './bootstrap'

import { Ziggy } from '@/ziggy'
import { createInertiaApp } from '@inertiajs/react'
import { HeroUIProvider } from '@heroui/react'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import React from 'react'
import { createRoot } from 'react-dom/client'
import { useRoute } from 'ziggy-js'
import { VisitorProvider } from './Providers/VisitorProvider'
import { LanguageProvider } from './Providers/LanguageProvider'

const appName = import.meta.env.VITE_APP_NAME || 'PWK ITERA'

createInertiaApp({
    title: title => (title ? `${title} - ${appName}` : appName),
    resolve: name =>
        resolvePageComponent(
            `./Pages/${name}.tsx`,
            import.meta.glob('./Pages/**/*.tsx')
        ),
    setup({ el, App, props }) {
        import.meta.env.VITE_NODE_ENV !== 'local'
            ? (Ziggy.url = 'http://localhost:8000')
            : Ziggy.url

        window.route = useRoute()

        const appElement = (
            <React.StrictMode>
                <VisitorProvider>
                    <LanguageProvider>
                        <HeroUIProvider>
                            <App {...props} />
                        </HeroUIProvider>
                    </LanguageProvider>
                </VisitorProvider>
            </React.StrictMode>
        )
        createRoot(el).render(appElement)
    },
    progress: false
})
