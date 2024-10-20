import { Link } from "@inertiajs/react";
import AppLayout from "../../Layouts/AppLayout";

export default function ShowBeritaPage({ berita }) {
    console.log(berita);
    return (
        <AppLayout title={"Berita"}>
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <p className="text-center tex"> Berita </p>
                <div className="p-5">
                    <h1>{berita.judul}</h1>
                    <p>{berita.isi}</p>
                    <Link href={route("berita")}>Back</Link>
                </div>
            </div>
        </AppLayout>
    );
}
