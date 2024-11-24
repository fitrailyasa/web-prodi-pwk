import AppHead from '../Components/AppHead'
import NavBar from '../Components/NavBar'

interface AppLayoutProps {
    title: string
    children: React.ReactNode
}

export default function AppLayout({ title, children }: AppLayoutProps) {
    return (
        <>
            <AppHead title={title} />
            <main className="rounded-xl  ">
                <NavBar />
                {children}
            </main>
        </>
    )
}
