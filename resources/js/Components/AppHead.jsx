import { Head } from "@inertiajs/react";

export default function AppHead({ title }) {
    return (
        <Head>
            <title>{title}</title>
            <meta name="description" content="Laravel Inertia React" />
            <link rel="icon" href="/favicon.ico" />
        </Head>
    );
}
