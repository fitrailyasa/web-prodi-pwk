import { DosenCardType } from '@/types'
import { Button, Card, CardBody, Image, Link } from '@nextui-org/react'

const DosenAndStafCard: React.FC<{ staf: DosenCardType }> = ({ staf }) => {
    return (
        <Card className="w-64 hover:translate-x-2 hover:translate-y-2 transform transition-all duration-300">
            <CardBody>
                <Image
                    src={staf.image}
                    alt="foto-dosen-1"
                    width={'100%'}
                    className="aspect-[4/3] rounded-xl"
                />
                <h3 className="font-bold text-center text-wrap text-lg pt-3 pb-1">
                    {staf.name}
                </h3>
                {staf.position && (
                    <p className="text-center text-gray-500 text-sm">
                        {staf.position}
                    </p>
                )}
                <div className="flex justify-end items-center mt-3">
                    <Link href="#">
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
