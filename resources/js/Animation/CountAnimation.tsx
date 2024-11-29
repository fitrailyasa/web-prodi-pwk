import React, { useEffect } from 'react'
import { motion, useMotionValue, useTransform, animate } from 'framer-motion'

interface CountAnimationProps {
    from: number
    to: number
    duration?: number // Duration in seconds
    className?: string
}

const CountAnimation: React.FC<CountAnimationProps> = ({
    from,
    to,
    duration = 2,
    className
}) => {
    const motionValue = useMotionValue(from) // Initialize motion value
    const roundedValue = useTransform(motionValue, value => Math.round(value)) // Transform value to rounded integer

    useEffect(() => {
        const controls = animate(motionValue, to, {
            duration
        })

        // Clean up animation on unmount
        return controls.stop
    }, [motionValue, to, duration])

    return (
        <motion.div className={className}>
            <motion.span>{roundedValue}</motion.span>
        </motion.div>
    )
}

export default CountAnimation
