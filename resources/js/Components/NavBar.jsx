import { Link } from "@inertiajs/react";

export default function NavBar() {
    return (
        <nav className="bg-gray-800 text-white/50 dark:bg-black dark:text-white/50">
            <div className="container mx-auto px-4">
                <div className="flex justify-between items-center py-4">
                    <div>
                        <Link
                            href={route("beranda")}
                            className="text-lg font-bold"
                        >
                            Laravel Inertia React
                        </Link>
                    </div>
                    <div>
                        <Link href={route("beranda")}>beranda</Link>
                        <Link href={route("about")}>About</Link>
                    </div>
                </div>
            </div>
        </nav>
    );
}
