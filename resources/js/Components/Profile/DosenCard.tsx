import { DosenCardType } from '@/types'
import { Button, Card, CardBody, Image, Link } from '@heroui/react'

interface DosenAndStafCardProps {
    staf: DosenCardType
    isCoordinator?: boolean
}

const DosenAndStafCard: React.FC<DosenAndStafCardProps> = ({
    staf,
    isCoordinator = false
}) => {
    return (
        <Card
            className={`w-64 hover:translate-x-2 hover:translate-y-2 transform transition-all duration-300 ${isCoordinator ? 'border-2 border-main-green' : ''}`}
        >
            <CardBody>
                <Image
                    src={staf.image}
                    alt="foto-dosen-1"
                    width={'100%'}
                    className="aspect-[4/3] rounded-xl"
                />
                <h3 className="font-bold text-center text-wrap text-lg pt-3 pb-1 text-main-blue">
                    {staf.name}
                </h3>
                {staf.position && (
                    <p className="text-center text-main-blue text-sm">
                        {staf.position}
                    </p>
                )}
                <div className="flex justify-end items-center mt-3">
                    <Link
                        href={route('profile.dosen-and-staf.detail', staf.id)}
                    >
                        <Button className="bg-main-green font-semibold text-white inline-block">
                            Detail
                        </Button>
                    </Link>
                </div>
            </CardBody>
        </Card>
    )
}

export default DosenAndStafCard
