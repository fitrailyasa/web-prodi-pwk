import { DosenCardType, StorageProps } from '@/types'
import { Button, Card, CardBody, Image, Link } from '@heroui/react'
import { useTranslation } from '@/Hooks/useTranslation'
import { usePage } from '@inertiajs/react'
import { TestImage } from '@/Constants'

interface DosenAndStafCardProps {
    staf: DosenCardType
    isCoordinator?: boolean
}

const DosenAndStafCard: React.FC<DosenAndStafCardProps> = ({
    staf,
    isCoordinator = false
}) => {
    const { storage } = usePage<{
        storage: StorageProps
    }>().props
    const detailText = useTranslation('Detail')

    const imageLink = staf.image ? storage.link + staf.image : TestImage

    return (
        <Card
            className={`w-64 hover:translate-x-2 hover:translate-y-2 transform transition-all duration-300 ${isCoordinator ? 'border-2 border-main-green' : ''}`}
        >
            <CardBody>
                <Image
                    src={imageLink}
                    alt={`foto-${staf.name}`}
                    width={'100%'}
                    className="aspect-[3/4] rounded-xl object-cover"
                />
                <h3 className="font-bold text-center text-wrap text-lg pt-3 pb-1 text-main-blue-light">
                    {staf.name}
                </h3>
                {staf.position && (
                    <p className="text-center text-main-blue-light text-sm">
                        {useTranslation(staf.position)}
                    </p>
                )}
                <div className="flex justify-end items-center mt-3">
                    <Link
                        href={route('profile.dosen-and-staf.detail', staf.id)}
                    >
                        <Button className="bg-main-green font-semibold text-white inline-block">
                            {detailText}
                        </Button>
                    </Link>
                </div>
            </CardBody>
        </Card>
    )
}

export default DosenAndStafCard
