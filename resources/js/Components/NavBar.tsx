import { Link } from '@inertiajs/react'

export default function NavBar() {
    const auth = false
    return (
        <nav className="text-gray-600">
            <div className="container mx-auto px-4">
                <div className="flex justify-between items-center py-4">
                    <div>
                        <Link
                            href={route('beranda')}
                            className="text-lg font-bold"
                        >
                            Laravel Inertia React
                        </Link>
                    </div>
                    <div className=" flex gap-5">
                        <Link
                            className="cursor-pointer"
                            href={route('beranda')}
                        >
                            beranda
                        </Link>
                        <Link className="cursor-pointer" href={route('about')}>
                            About
                        </Link>
                        <Link className="cursor-pointer" href={route('berita')}>
                            berita
                        </Link>
                        {auth ? (
                            <a
                                className="cursor-pointer"
                                href={route('logout')}
                            >
                                Logout
                            </a>
                        ) : (
                            <a className="cursor-pointer" href={route('login')}>
                                Login
                            </a>
                        )}
                    </div>
                </div>
            </div>
        </nav>
    )
}
