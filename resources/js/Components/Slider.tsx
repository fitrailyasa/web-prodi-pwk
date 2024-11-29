import React, { useEffect, useState } from 'react'
import { motion, AnimatePresence } from 'framer-motion'
import { wrap } from 'popmotion'
import PrevIcon from './Icon/PrevIcon'
import NextIcon from './Icon/NextIcon'

const variants = {
    enter: (direction: number) => ({
        x: direction > 0 ? 1000 : -1000,
        opacity: 0
    }),
    center: {
        zIndex: 1,
        x: 0,
        opacity: 1
    },
    exit: (direction: number) => ({
        zIndex: 0,
        x: direction < 0 ? 1000 : -1000,
        opacity: 0
    })
}

const swipeConfidenceThreshold = 10000
const swipePower = (offset: number, velocity: number) => {
    return Math.abs(offset) * velocity
}

interface SliderProps {
    children: React.ReactNode[]
    className?: String
    interval?: number
    autoSlider?: boolean
    sendComponent?: (component: React.ReactNode) => void
}

export const Slider: React.FC<SliderProps> = ({
    children,
    className,
    interval, // in seconds
    autoSlider = true,
    sendComponent
}) => {
    const [[page, direction], setPage] = useState<[number, number]>([0, 0])

    const childIndex = wrap(0, children.length, page)

    const paginate = (newDirection: number) => {
        console.log('newDirection', newDirection)
        setPage([page + newDirection, newDirection])
    }
    useEffect(() => {
        sendComponent &&
            sendComponent(
                <div className=" flex gap-2 py-6">
                    {Array.from({ length: children.length }).map((_, index) => (
                        <button
                            key={index}
                            onClick={() => setPage([index, index - childIndex])}
                            className={`w-3 h-3 rounded-full cursor-pointer ${
                                index === childIndex
                                    ? 'bg-gray-200'
                                    : 'bg-transparent border border-gray-200'
                            }`}
                        ></button>
                    ))}
                </div>
            )
        if (autoSlider) {
            const autoSlide = setInterval(
                () => {
                    paginate(1)
                },
                interval ? interval * 1000 : 3000
            )

            return () => clearInterval(autoSlide)
        }
    }, [childIndex])

    return (
        <div
            className={`relative z-10 w-full h-full  bg-gray-100 ${className}`}
        >
            <AnimatePresence initial={false} custom={direction}>
                <motion.div
                    key={page}
                    custom={direction}
                    variants={variants}
                    initial="enter"
                    animate="center"
                    exit="exit"
                    transition={{
                        x: { type: 'spring', stiffness: 300, damping: 30 },
                        opacity: { duration: 0.2 }
                    }}
                    drag="x"
                    dragConstraints={{ left: 0, right: 0 }}
                    dragElastic={1}
                    onDragEnd={(e, { offset, velocity }) => {
                        const swipe = swipePower(offset.x, velocity.x)

                        if (swipe < -swipeConfidenceThreshold) {
                            paginate(1)
                        } else if (swipe > swipeConfidenceThreshold) {
                            paginate(-1)
                        }
                    }}
                    className="absolute w-full h-full"
                >
                    {children[childIndex]}
                </motion.div>
            </AnimatePresence>

            <div
                className="absolute z-20 top-1/2 left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                onClick={() => paginate(-1)}
            >
                <PrevIcon className="justify-center flex" size={24} />
            </div>
            <div
                className="absolute z-20 top-1/2 right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                onClick={() => paginate(1)}
            >
                <NextIcon className="justify-center flex" size={24} />
            </div>
        </div>
    )
}
