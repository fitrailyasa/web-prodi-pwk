import { VisitOptions } from '@inertiajs/core'
import { type AxiosInstance } from 'axios'
import { type route as routeFn } from 'ziggy-js'

declare global {
    let route: typeof routeFn
    interface Window {
        route: typeof route
        axios: AxiosInstance
    }
}
