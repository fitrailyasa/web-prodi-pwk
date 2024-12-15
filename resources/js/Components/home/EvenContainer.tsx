import { eventTypes } from '@/types/PropsType'
import MultyPersonIcon from '../Icon/MultyPersonIcon'
import { DateExtraktor } from '@/Helper/DateFormater'
import {
    Button,
    Modal,
    ModalBody,
    ModalContent,
    ModalFooter,
    ModalHeader,
    useDisclosure
} from '@nextui-org/react'
import ClaenderIcon from '../Icon/CalenderIcon'
import ControlCenterMac from '../ControlCenterMac'

const EvenContainer: React.FC<eventTypes> = ({
    title,
    dateStart,
    date,
    dateEnd,
    description
}: eventTypes) => {
    const { isOpen, onOpen, onOpenChange } = useDisclosure()
    // get full mount
    const eventStart = DateExtraktor({ date: dateStart })

    const eventEnd = dateEnd && DateExtraktor({ date: dateEnd })

    return (
        <>
            <button
                onClick={onOpen}
                className="border p-3 rounded-2xl flex gap-3 items-center bg-secondary-blue-light flex-1"
            >
                <div className="flex flex-nowrap gap-3 items-center">
                    <div className="flex  border-e-2 border-main-green items-center px-3 ">
                        <span className="text-lg font-bold text-nowrap text-main-green">
                            {eventStart.date}, {eventStart.month}{' '}
                            {eventEnd &&
                                ` - ${eventEnd.date}, ${eventEnd.month}`}
                        </span>
                    </div>
                    <h1 className="text-lg font-bold md:text-nowrap ">
                        {title}
                    </h1>
                </div>
            </button>

            <Modal
                isOpen={isOpen}
                size="4xl"
                placement="bottom-center"
                onOpenChange={onOpenChange}
            >
                <ModalContent>
                    {onClose => (
                        <>
                            <ModalHeader>
                                <ControlCenterMac />
                            </ModalHeader>
                            <ModalBody className="px-10 py-4">
                                <div className="flex gap-3 items-center py-3">
                                    <ClaenderIcon
                                        size={5}
                                        className="text-main-green text-lg"
                                    />
                                    <div className="">
                                        <p className="text-lg font-semibold">
                                            Start Date :{' '}
                                        </p>
                                        <span className="text-2xl font-bold text-main-green">
                                            {eventStart.date},{' '}
                                            {eventStart.month} {eventStart.year}
                                        </span>
                                    </div>
                                    {eventEnd && (
                                        <div className="">
                                            <p className="text-lg font-semibold">
                                                Start Date :{' '}
                                            </p>
                                            <span className="text-2xl font-bold text-main-green">
                                                {eventEnd.date},{' '}
                                                {eventEnd.month} {eventEnd.year}
                                            </span>
                                        </div>
                                    )}
                                </div>
                                <h1 className="text-2xl font-bold">{title}</h1>
                                <p>{description}</p>
                            </ModalBody>
                            <ModalFooter>
                                <Button
                                    className="bg-red-500 text-white font-semibold"
                                    onPress={onClose}
                                >
                                    Close
                                </Button>
                            </ModalFooter>
                        </>
                    )}
                </ModalContent>
            </Modal>
        </>
    )
}

export default EvenContainer
