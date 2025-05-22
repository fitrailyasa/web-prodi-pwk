import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import DosenAndStafCard from '@/Components/Profile/DosenCard'
import AppLayout from '@/Layouts/AppLayout'
import { DosenCardType, EmployePageProps } from '@/types'
import React from 'react'
import { useTranslation } from '@/Hooks/useTranslation'

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
    const translatedTitle = useTranslation(title)

    if (!users || users.length === 0) return null

    return (
        <SectionTrigerScroll
            id="list-dosenand-staf"
            className={`mt-10 ${className}`}
        >
            <div className="text-center mb-8">
                <h2 className="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r text-main-blue-light bg-clip-text">
                    {translatedTitle}
                </h2>
                <div className="w-full max-w-[100px] h-1 bg-gradient-to-r from-main-blue to-main-green mx-auto rounded-full"></div>
            </div>
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
    const pageTitle = useTranslation('Dosen & Staf')
    const koordinatorTitle = useTranslation(
        'Koordinator Program Studi PWK ITERA'
    )
    const pengurusTitle = useTranslation('Pengurus Program Studi PWK ITERA')
    const dosenTitle = useTranslation('Dosen Program Studi PWK ITERA')
    const tendikTitle = useTranslation('Tendik Dan Staf')

    const pengurus =
        employee?.filter(
            item =>
                item.position &&
                item.position.toLowerCase() !== 'staff' &&
                item.position.toLowerCase() !== 'koordinator'
        ) || []

    const dosen = employee?.filter(item => !item.position) || []

    return (
        <AppLayout title={pageTitle}>
            {koordinator && (
                <Section
                    title={koordinatorTitle}
                    users={[koordinator]}
                    className="flex flex-col items-center max-w-4xl mx-auto"
                    isCoordinator={true}
                />
            )}
            <Section title={pengurusTitle} users={pengurus} />
            <Section title={dosenTitle} users={dosen} />
            <Section title={tendikTitle} users={staff || []} />
        </AppLayout>
    )
}

export default DosenAndStaf
