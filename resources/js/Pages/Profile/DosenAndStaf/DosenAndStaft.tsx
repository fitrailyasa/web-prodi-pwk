import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import DosenAndStafCard from '@/Components/Profile/DosenCard'
import AppLayout from '@/Layouts/AppLayout'
import { DosenCardType, EmployePageProps } from '@/types'
import React from 'react'

interface SectionProps {
    title: string
    users: DosenCardType[]
    className?: string
    isCoordinator?: boolean
}

const Section: React.FC<SectionProps> = ({
    title,
    users,
    className = '',
    isCoordinator = false
}) => {
    if (!users || users.length === 0) return null

    return (
        <SectionTrigerScroll id="list-berita" className={`mt-10 ${className}`}>
            <h2
                className={`font-bold text-center text-main-blue-light text-4xl mb-4 pb-4`}
            >
                {title}
            </h2>
            <div
                className={`flex flex-wrap gap-7 ${isCoordinator ? 'justify-center' : 'justify-center'}`}
            >
                {users.map((user, index) => (
                    <DosenAndStafCard
                        key={index}
                        staf={user}
                        isCoordinator={isCoordinator}
                    />
                ))}
            </div>
        </SectionTrigerScroll>
    )
}

const DosenAndStaf: React.FC<EmployePageProps> = ({
    koordinator,
    employee,
    staff
}) => {
    const pengurus =
        employee?.filter(
            item => item.position && item.position.toLowerCase() !== 'staf'
        ) || []

    const dosen = employee?.filter(item => !item.position) || []

    return (
        <AppLayout title="Dosen & Staf">
            <div className="container mx-auto px-4 relative">
                {koordinator && (
                    <Section
                        title="Koordinator Program Studi PWK ITERA"
                        users={[koordinator]}
                        className="flex flex-col items-center max-w-4xl mx-auto mb-12"
                        isCoordinator={true}
                    />
                )}

                <Section
                    title="Pengurus Program Studi PWK ITERA"
                    users={pengurus}
                    className="mb-12"
                />

                <Section
                    title="Dosen Program Studi PWK ITERA"
                    users={dosen}
                    className="mb-12"
                />

                <Section
                    title="Tendik Dan Staf"
                    users={staff || []}
                    className="mb-12"
                />
            </div>
        </AppLayout>
    )
}

export default DosenAndStaf
