import { Head } from '@inertiajs/react'

type AppHeadProps = {
    title: string
}

export default function AppHead({ title }: AppHeadProps) {
    return (
        <Head>
            <title>{title}</title>
            <meta name="description" content="Laravel Inertia React" />
            <link rel="icon" href="/favicon.ico" />
        </Head>
    )
}
